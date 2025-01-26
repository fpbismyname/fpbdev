import React from "react";

interface ButtonProps{
    text?: string;
    style?: string;
    isActive?: boolean;
    type?:string;
    href?: string;
    size?: string;
    clickFunc?: ()=> void;
    focusFunc?: ()=> void;
    blurFunc?: ()=> void;
    children?: React.ReactNode;
}

const Button:React.FC<ButtonProps> = ({text, style, size, isActive = false, type = "btn", href = "", clickFunc, children, focusFunc, blurFunc}) =>{
    const styleButton = isActive ? `${type}-${style}-active` : `${type}-${style}`
    return(
        <>
        {type == "btn" ?     
        <button className={`${styleButton} ${size}`} onFocus={focusFunc} onBlur={blurFunc} onClick={clickFunc}>{children} {text}</button>
        : 
        <a className={`${styleButton} ${size}`} href={href} onClick={clickFunc} target="_blank">{children}{text}</a>
        }
        </>
    )
}

export default Button;