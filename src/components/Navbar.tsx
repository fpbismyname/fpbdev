import React from "react";
import Button from "../components/button";
import "../index.css"


const Navbar:React.FC = () =>{
    return (
        <>
            <div className="flex flex-row justify-between px-12 py-6 items-center">
                <div className="flex flex-col">
                    <h3>FPB</h3>
                </div>
                <div className="flex flex-col">
                    <ul className="flex flex-row gap-4 items-center text-md">
                        <li><Button text="Home" style="primary" type="link" href="/home"/></li>
                        <li><Button text="Portofolio" style="primary" type="link" href="/portofolio"/></li>
                        <li><Button text="Skills" style="primary" type="link" href="/skills"/></li>
                        <li><Button text="About" style="primary" type="link" href="/about"/></li>
                        <li><Button text="Contact" style="primary" type="link" href="/contact"/></li>
                    </ul>
                </div>
            </div>
        </>
    )
}

export default Navbar