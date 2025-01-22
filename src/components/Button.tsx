import React from "react";

interface ButtonProps{
    text?: string;
    style?: string;
    isActive?: boolean;
    type?:string;
    href?: string;
}

const Button:React.FC<ButtonProps> = ({text, style, isActive = false, type = "btn", href = ""}) =>{
    const styleButton = isActive ? `${type}-active` : `${type}-${style}`
    return(
        <>
        {type == "btn" ?     
        <button className={`${styleButton}`}>{text}</button>
        : 
        <a className={`${styleButton}`} href={href}>{text}</a>
        }
        </>
    )
}

export default Button;