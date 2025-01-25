import React, { useEffect, useState } from "react";
import Button from "../components/Button";
import "../index.css";

type NavbarProps = {
    func?: FunctionMenu
}
interface FunctionMenu{
    [key:string] : ()=>void
}

const Navbar: React.FC<NavbarProps> = ({func}) => {
  const [isScrolled, setIsScrolled] = useState(false);

  const HandleClick = (key:string)=>{
    if (func && typeof func[key] === "function"){
        func[key]()
    } else {
        console.log("No function found");   
    }
  }

  useEffect(() => {
    const checkScroll = () => {
      if (window.scrollY > 50) {
        setIsScrolled(true);
      } else {
        setIsScrolled(false);
      }
    };
    window.addEventListener("scroll", checkScroll);
    return () => {
      window.removeEventListener("scroll", checkScroll);
    };
  }, []);

  return (
    <>
      <div
        className={`sticky z-10 top-0 flex flex-row justify-between py-5 px-24 items-center ${
          isScrolled
            ? "bg-black/65 transition-color duration-300"
            : "bg-transparent transition-color duration-300"
        }`}
      >
        <div className="flex flex-col">
          <div className="inline">
            <span className="font-bold cursor-default">
                <h2 className="inline-block text-primary">FPB</h2>
                <h6 className="inline-block ml-1 opacity-25 h6 font-bold text-primary">DEV</h6>
            </span>
          </div>
        </div>
        <div className="flex flex-col">
          <ul className="flex flex-row gap-4 items-center">
            <li>
              <Button text="About" size="h3" style="primary" type="link" clickFunc={()=>HandleClick("About")}
              />
            </li>
            <li>
              <Button text="Skills" size="h3" style="primary" type="link" clickFunc={()=>HandleClick("Skills")}/>
            </li>
            <li>
              <Button text="Portfolio" size="h3" style="primary" type="link" clickFunc={()=>HandleClick("Porto")}/>
            </li>
            <li>
              <Button text="Contact" size="h3" style="primary" type="link" clickFunc={()=>HandleClick("Contact")}/>
            </li>
          </ul>
        </div>
      </div>
    </>
  );
};

export default Navbar;
