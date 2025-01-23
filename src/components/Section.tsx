import React from "react";

interface HomeProps{
    refSection?: React.RefObject<HTMLDivElement>;
    children?: React.ReactNode
}

const HeroSection:React.FC<HomeProps> = ({refSection, children}) =>{
    return(
        <>
            <div className="flex flex-row justify-between px-12" ref={refSection}>
                {children}
            </div>
        </>
    )
}

export default HeroSection;