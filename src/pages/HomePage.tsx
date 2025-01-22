import React from "react";
import Navbar from "../components/Navbar";
import "../index.css"

const HomePage:React.FC = () =>{
    return(
        <>
            <div className="flex flex-col">
                <Navbar/>
            </div>
        </>
    )
}

export default HomePage;