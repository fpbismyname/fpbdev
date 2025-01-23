import React, { RefObject, useRef } from "react";
import Navbar from "../components/Navbar";
import "../index.css";
import Section from "../components/Section";
import Profile from "/public/profile.png";

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
      top: topElementPos + window.scrollY - 170,
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
        <div className="container mx-auto px-12 flex flex-col gap-96">
          <Section refSection={section["About"]}>
            <div className="relative">
              <div className="flex flex-row gap-24">
                <div className="flex flex-col justify-center">
                  <div className="relative">
                    <img className="w-96 object-cover" src={Profile} />
                    <div className="light-purple"></div>
                  </div>
                </div>
                <div className="flex flex-col w-1/2 justify-center">
                  <div className="relative">
                    <h1 className="h1 mb-5">
                      Hi, I'm Fajar Perdiansyah Budiman.
                    </h1>
                    <div className="light-purple"></div>
                    <p className="h4 opacity-50">
                        I'm a Web Developer who thrives on crafting seamless
                        experiences, whether it's designing stunning user interfaces
                        (Frontend) or building powerful, scalable systems (Backend).
                        Though I've only been in this field for 5 months, my passion
                        and dedication drive me to deliver impactful results.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </Section>
          <Section refSection={section["Portfolio"]}>
            <div className="relative">
              <div className="flex flex-row gap-24">
                <div className="flex flex-col justify-center">
                  <div className="relative">
                    <img className="w-96 object-cover" src={Profile} />
                    <div className="light-purple"></div>
                  </div>
                </div>
                <div className="flex flex-col w-1/2 justify-center">
                  <div className="relative">
                    <h1 className="h1 mb-5">
                      Hi, I'm Fajar Perdiansyah Budiman.
                    </h1>
                    <div className="light-purple"></div>
                    <p className="h4 opacity-50">
                        I'm a Web Developer who thrives on crafting seamless
                        experiences, whether it's designing stunning user interfaces
                        (Frontend) or building powerful, scalable systems (Backend).
                        Though I've only been in this field for 5 months, my passion
                        and dedication drive me to deliver impactful results.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </Section>
          <Section refSection={section["adads"]}>
            <div className="relative">
              <div className="flex flex-row gap-24">
                <div className="flex flex-col justify-center">
                  <div className="relative">
                    <img className="w-96 object-cover" src={Profile} />
                    <div className="light-purple"></div>
                  </div>
                </div>
                <div className="flex flex-col w-1/2 justify-center">
                  <div className="relative">
                    <h1 className="h1 mb-5">
                      Hi, I'm Fajar Perdiansyah Budiman.
                    </h1>
                    <div className="light-purple"></div>
                    <p className="h4 opacity-50">
                        I'm a Web Developer who thrives on crafting seamless
                        experiences, whether it's designing stunning user interfaces
                        (Frontend) or building powerful, scalable systems (Backend).
                        Though I've only been in this field for 5 months, my passion
                        and dedication drive me to deliver impactful results.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </Section>
          <Section refSection={section["adads"]}>
            <div className="relative">
              <div className="flex flex-row gap-24">
                <div className="flex flex-col justify-center">
                  <div className="relative">
                    <img className="w-96 object-cover" src={Profile} />
                    <div className="light-purple"></div>
                  </div>
                </div>
                <div className="flex flex-col w-1/2 justify-center">
                  <div className="relative">
                    <h1 className="h1 mb-5">
                      Hi, I'm Fajar Perdiansyah Budiman.
                    </h1>
                    <div className="light-purple"></div>
                    <p className="h4 opacity-50">
                        I'm a Web Developer who thrives on crafting seamless
                        experiences, whether it's designing stunning user interfaces
                        (Frontend) or building powerful, scalable systems (Backend).
                        Though I've only been in this field for 5 months, my passion
                        and dedication drive me to deliver impactful results.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </Section>
          <Section refSection={section["adads"]}>
            <div className="relative">
              <div className="flex flex-row gap-24">
                <div className="flex flex-col justify-center">
                  <div className="relative">
                    <img className="w-96 object-cover" src={Profile} />
                    <div className="light-purple"></div>
                  </div>
                </div>
                <div className="flex flex-col w-1/2 justify-center">
                  <div className="relative">
                    <h1 className="h1 mb-5">
                      Hi, I'm Fajar Perdiansyah Budiman.
                    </h1>
                    <div className="light-purple"></div>
                    <p className="h4 opacity-50">
                        I'm a Web Developer who thrives on crafting seamless
                        experiences, whether it's designing stunning user interfaces
                        (Frontend) or building powerful, scalable systems (Backend).
                        Though I've only been in this field for 5 months, my passion
                        and dedication drive me to deliver impactful results.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </Section>
            <Section refSection={section["adads"]}>
                <div className="relative">
                <div className="flex flex-row gap-24">
                    <div className="flex flex-col justify-center">
                    <div className="relative">
                        <img className="w-96 object-cover" src={Profile} />
                        <div className="light-purple"></div>
                    </div>
                    </div>
                    <div className="flex flex-col w-1/2 justify-center">
                    <div className="relative">
                        <h1 className="h1 mb-5">
                        Hi, I'm Fajar Perdiansyah Budiman.
                        </h1>
                        <div className="light-purple"></div>
                        <p className="h4 opacity-50">
                            I'm a Web Developer who thrives on crafting seamless
                            experiences, whether it's designing stunning user interfaces
                            (Frontend) or building powerful, scalable systems (Backend).
                            Though I've only been in this field for 5 months, my passion
                            and dedication drive me to deliver impactful results.
                        </p>
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
