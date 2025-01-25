import React from "react";

interface HomeProps{
    refSection?: React.RefObject<HTMLDivElement>;
    children?: React.ReactNode
    flexType?: string
}

const HeroSection:React.FC<HomeProps> = ({refSection, children, flexType}) =>{
    return(
        <>
            <div className={`flex ${flexType} justify-between px-12 w-full`} ref={refSection}>
                {children}
            </div>
        </>
    )
}

export default HeroSection;