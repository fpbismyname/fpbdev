import React from "react";

interface ButtonProps{
    text?: string;
    style?: string;
    isActive?: boolean;
    type?:string;
    href?: string;
    size?: string;
    clickFunc?: ()=> void;
}

const Button:React.FC<ButtonProps> = ({text, style, size, isActive = false, type = "btn", href = "", clickFunc}) =>{
    const styleButton = isActive ? `${type}-${style}-active` : `${type}-${style}`
    return(
        <>
        {type == "btn" ?     
        <button className={`${styleButton} ${size}`} onClick={clickFunc}>{text}</button>
        : 
        <a className={`${styleButton} ${size}`} href={href} onClick={clickFunc}>{text}</a>
        }
        </>
    )
}

export default Button;