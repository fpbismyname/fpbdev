import React, { useEffect, useState, useRef } from "react";
import Button from "../components/Button";
import "../index.css";

type NavbarProps = {
    func?: FunctionMenu
}
interface FunctionMenu{
    [key:string] : ()=>void
}

const Navbar: React.FC<NavbarProps> = ({func}) => {

  const bar =useRef<HTMLUListElement>(null)
  
  const [isBarFocus, setIsBarFocus] = useState(false)
  const [isScrolled, setIsScrolled] = useState(false);

  const HandleClick = (key:string)=>{
    if (func && typeof func[key] === "function"){
        func[key]()
    } else {
        console.log("No function found");   
    }
  }

  const handleFocusBar = () =>{
    const handleBar = bar.current
    if(isBarFocus){
      if (handleBar) {
        handleBar.classList.remove("flex", "-translate-x-1/2", "p-4", "rounded-xl", "absolute", "top-0", "left-1/2", "bg-black/50")
        handleBar.classList.add("hidden")
      }
      setIsBarFocus(false)
    } else {
      if (handleBar) {
        handleBar.classList.add("flex", "-translate-x-1/2", "p-4", "rounded-xl", "absolute", "top-0", "left-1/2", "bg-black/50")
        handleBar.classList.remove("hidden")
      }
      setIsBarFocus(true)
    }
  }
  const handleUnFocusBar = () =>{
    const handleBar = bar.current
    setTimeout(()=>{
      if (handleBar) {
        handleBar.classList.remove("flex", "-translate-x-1/2", "p-4", "rounded-xl", "absolute", "top-0", "left-1/2", "bg-black/50")
        handleBar.classList.add("hidden")
      }
      setIsBarFocus(false)
    },150)
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
        className={`sticky z-10 top-0 flex flex-row justify-between py-2.5 px-12 md:py-5 md:px-24 items-center ${
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
          <Button clickFunc={handleFocusBar} blurFunc={handleUnFocusBar} style="primary md:hidden" type="btn">
            <i className="bi bi-justify"></i>
          </Button>
          <div className="relative">
            <ul className="md:flex md:flex-row flex-col gap-4 items-center hidden" ref={bar}>
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
      </div>
    </>
  );
};

export default Navbar;
