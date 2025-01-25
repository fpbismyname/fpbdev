import React, { RefObject, useRef } from "react";
import Navbar from "../components/Navbar";
import "../index.css";
import Section from "../components/Section";
import Profile from "/profiles.webp";
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
    if (Ref.current) {
      Ref.current.scrollIntoView({
        behavior: "smooth",
        block: "center",
      });
    }
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
          <Section refSection={section["About"]} flexType="flex-row">
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
                    I am a website developer who can help you create a website.
                    In creating websites, I have 1 year of experience in
                    fullstack website development, website designer, user
                    testing, and UX design. My dedication and passion will bring
                    a useful impact in website development.
                  </p>
                  <Button
                    text="Next >>>"
                    style="primary"
                    clickFunc={() => BarMenu.Skills()}
                    type="btn"
                  />
                </div>
              </div>
            </div>
          </Section>
          <Section refSection={section["Skills"]} flexType="flex-col">
            <div className="flex flex-row w-full py-12">
              <div className="flex flex-col w-full items-center text-center gap-10">
                <div className="relative w-2/3">
                  <div className="light-purple"></div>
                  <p className="h3 opacity-50">
                    These are some of the skills that I have mastered in
                    dedicating myself to the field of website development.
                  </p>
                </div>
              </div>
            </div>
            <div className="flex flex-row w-full gap-24">
              <div className="flex flex-col w-full items-end">
                <div className="relative">
                  <div className="light-purple animate-[spin_3s_linear_infinite]"></div>
                  <h1 className="h3">
                    <i className="fa-solid fa-briefcase mr-2"></i>Hard skills
                  </h1>
                  <ul className="*:h6 opacity-50 py-6">
                    <li className="mb-2">HTML, CSS, and JS</li>
                    <li className="mb-2">React JS - Single page</li>
                    <li className="mb-2">Laravel Fullstack</li>
                    <li className="mb-2">Flask Fullstack</li>
                    <li className="mb-2">Firebase Database</li>
                    <li className="mb-2">MySQL</li>
                  </ul>
                </div>
              </div>
              <div className="flex flex-col w-full items-start">
                <div className="relative">
                  <div className="light-purple animate-[spin_3s_linear_infinite]"></div>
                  <h1 className="h3">
                    <i className="fa-solid fa-handshake mr-2"></i>Soft Skills
                  </h1>
                  <ul className="*:h6 opacity-50 py-6">
                    <li className="mb-2">Team Collaboration</li>
                    <li className="mb-2">Problem Solving</li>
                    <li className="mb-2">Time Management</li>
                    <li className="mb-2">Mind Management</li>
                    <li className="mb-2">Communication</li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="flex flex-row w-full py-12">
              <div className="flex flex-col w-full items-center text-center gap-10">
                <Button
                  text="Next >>>"
                  style="primary"
                  type="btn"
                  clickFunc={() => BarMenu.Porto()}
                />
              </div>
            </div>
          </Section>
          <Section refSection={section["Portfolio"]} flexType="flex-col">
            <div className="flex flex-row w-full py-12">
              <div className="flex flex-col w-full items-center text-center gap-10">
                <div className="relative w-2/3">
                  <div className="light-purple"></div>
                  <p className="h3 opacity-50">
                    These are some of the projects I have completed in website
                    development.
                  </p>
                </div>
              </div>
            </div>
            <div className="flex flex-row flex-wrap w-full p-10 gap-12 justify-center">
              <div className="flex flex-col w-1/4 items-center">
                <div className="relative flex flex-col gap-2">
                  <div className="light-purple animate-[pulse_3s_linear_infinite]"></div>
                  <h1 className="h3">Requirement management Tools</h1>
                  <p className="h6 opacity-50">
                    a website to manage development requests, such as bugs,
                    feature requests, interface design, website system
                    improvements, etc.
                  </p>
                  <div className="relative">
                    <Button
                      text="Visit here"
                      style="secondary"
                      type="link"
                      size="h6"
                      href="https://zhihab.my.id/"
                    />
                  </div>
                </div>
              </div>
              <div className="flex flex-col w-1/4 items-center">
                <div className="relative flex flex-col gap-2">
                  <div className="light-purple animate-[pulse_3s_linear_infinite]"></div>
                  <h1 className="h3">Carbon emissions management</h1>
                  <p className="h6 opacity-50">
                    a website for managing carbon emissions arising from a
                    specific activity within the company's scope, or more
                  </p>
                  <div className="relative">
                    <Button
                      text="Visit here"
                      style="secondary"
                      type="link"
                      size="h6"
                      href="https://emisi.zhihab.my.id/login"
                    />
                  </div>
                </div>
              </div>
              <div className="flex flex-col w-1/4 items-center">
                <div className="relative flex flex-col gap-2">
                  <div className="light-purple animate-[pulse_3s_linear_infinite]"></div>
                  <h1 className="h3">Check your khodam</h1>
                  <p className="h6 opacity-50">
                    a website for checking spiritual beings such as khodam, this
                    website is made just for fun.
                  </p>
                  <div className="relative">
                    <Button
                      text="Visit here"
                      style="secondary"
                      type="link"
                      size="h6"
                      href="https://cek-khodam-dirimu.vercel.app/"
                    />
                  </div>
                </div>
              </div>
              <div className="flex flex-col w-1/4 items-center">
                <div className="relative flex flex-col gap-2">
                  <div className="light-purple animate-[pulse_3s_linear_infinite]"></div>
                  <h1 className="h3">CV. Berkah Jaya Cianjur</h1>
                  <p className="h6 opacity-50">
                    Building construction website, promoting reliable builders
                    in Indonesia, with workers who are persistent, strong, and
                    ready to work.
                  </p>
                  <div className="relative">
                    <Button
                      text="Visit here"
                      style="secondary"
                      type="link"
                      size="h6"
                      href="https://cv-berkah-jaya.vercel.app/"
                    />
                  </div>
                </div>
              </div>
            </div>
          </Section>
          <Section refSection={section["Contact"]} flexType="flex-col">
            <div className="flex flex-row w-full py-4">
              <div className="flex flex-col w-full items-center text-center">
                <div className="relative w-2/3">
                  <div className="light-purple"></div>
                  <p className="h3 opacity-50">
                  Contact me for more information.
                  </p>
                </div>
              </div>
            </div>
            <div className="flex flex-row flex-wrap w-full p-10 gap-12 justify-center">
              <div className="flex flex-row w-1/4 items-center justify-center gap-8">
                <div className="relative flex flex-col gap-2">
                  <Button style="primary" type="link" href="https://www.linkedin.com/in/fajar-perdiansyah-budiman-b28217312/">
                    <i className="fa-brands fa-linkedin text-primary"></i>
                  </Button>
                </div>
                <div className="relative flex flex-col gap-2">
                  <Button style="primary" type="link" href="https://github.com/fpbismyname">
                    <i className="fa-brands fa-github text-primary"></i>
                  </Button>
                </div>
                <div className="relative flex flex-col gap-2">
                  <Button style="primary" type="link" href="https://www.instagram.com/fpb_vfx/">
                    <i className="fa-brands fa-instagram text-primary"></i>
                  </Button>
                </div>
                <div className="relative flex flex-col gap-2">
                  <Button style="primary" type="link" href="https://x.com/VFPBV">
                    <i className="bi bi-twitter-x text-primary"></i>
                  </Button>
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
