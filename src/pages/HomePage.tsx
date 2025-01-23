import React, { RefObject, useRef } from "react";
import Navbar from "../components/Navbar";
import "../index.css";
import Section from "../components/Section";
import Profile from "/profiles.png";
import Button from "../components/Button";

interface Ref {
  [key: string]: React.RefObject<HTMLDivElement>;
}
type FuncRef = {
  [key: string]: () => void;
};

const HomePage: React.FC = () => {
  const section: Ref = {
    About: useRef<HTMLDivElement>(null),
    Portfolio: useRef<HTMLDivElement>(null),
    Skills: useRef<HTMLDivElement>(null),
    Contact: useRef<HTMLDivElement>(null),
  };
  const scrollToSection = (currentRef: string) => {
    event?.preventDefault();
    const Ref: RefObject<HTMLDivElement> = section[currentRef];
    const topElementPos: any = Ref.current?.getBoundingClientRect().top;
    window.scrollTo({
      top: topElementPos + window.scrollY - 171,
      behavior: "smooth",
    });
  };
  const BarMenu: FuncRef = {
    About: () => scrollToSection("About"),
    Porto: () => scrollToSection("Portfolio"),
    Skills: () => scrollToSection("Skills"),
    Contact: () => scrollToSection("Contact"),
  };
  return (
    <>
      <div className="flex flex-col gap-[10vh]">
        <Navbar func={BarMenu} />
        <div className="container mx-auto px-12 flex flex-col gap-64">
          <Section refSection={section["About"]}>
            <div className="relative">
              <div className="flex flex-row gap-24">
                <div className="flex flex-col justify-center">
                  <div className="relative">
                    <img className="w-96 object-cover" src={Profile} />
                    <div className="light-purple animate-[pulse_3s_linear_infinite]"></div>
                  </div>
                </div>
                <div className="flex flex-col w-1/2 justify-center">
                  <div className="relative">
                    <h1 className="h1 mb-2">
                      Hi, I'm FPB / Fajar Perdiansyah Budiman,
                    </h1>
                    <div className="light-purple"></div>
                    <p className="h4 opacity-50 mb-8">
                      I am a website developer who can help you in creating a web on the front side. In creating websites I have 1 year of experience in fullstack website development, website designer, user testing, and UX design. My dedication and passion will bring a useful impact in website development.
                    </p>
                    <Button text="Next >>>" style="primary" clickFunc={() =>BarMenu.Skills()} type="btn"/>
                  </div>
                </div>
              </div>
            </div>
          </Section>
          <Section refSection={section["Skills"]}>
            <div className="relative">
              <div className="flex flex-row gap-24">
                <div className="flex flex-col justify-center">
                  <div className="relative">

                  </div>
                </div>
                <div className="flex flex-col w-1/2 justify-center">
                  <div className="relative">

                  </div>
                </div>
              </div>
            </div>
          </Section>
        </div>
      </div>
    </>
  );
};

export default HomePage;
