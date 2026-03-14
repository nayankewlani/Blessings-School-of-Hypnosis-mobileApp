export default function TitleSlide() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(135deg, #0D0520 0%, #1A0A3C 50%, #0D0520 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 15% 50%, rgba(123,47,190,0.35) 0%, transparent 45%), radial-gradient(circle at 85% 20%, rgba(0,201,177,0.2) 0%, transparent 40%), radial-gradient(circle at 70% 80%, rgba(201,168,76,0.15) 0%, transparent 35%)" }} />
      <div className="absolute top-[8vh] left-[7vw] w-[12vw] h-[12vw] rounded-full opacity-10" style={{ background: "radial-gradient(circle, #C9A84C, transparent)" }} />
      <div className="absolute bottom-[5vh] right-[5vw] w-[18vw] h-[18vw] rounded-full opacity-8" style={{ background: "radial-gradient(circle, #7B2FBE, transparent)" }} />
      <div className="absolute top-[3vh] left-[6vw] right-[6vw] flex items-center justify-between">
        <div className="text-[1.3vw] font-semibold tracking-[0.25em] uppercase" style={{ color: "#C9A84C" }}>
          Architecture Documentation
        </div>
        <div className="text-[1.2vw]" style={{ color: "rgba(245,240,255,0.45)" }}>
          v1.0 · 2026
        </div>
      </div>
      <div className="relative flex flex-col justify-center h-full px-[8vw]">
        <div className="mb-[2vh]">
          <div className="inline-flex items-center gap-[1vw] mb-[3vh]">
            <div className="h-[0.2vh] w-[4vw]" style={{ background: "#C9A84C" }} />
            <span className="text-[1.4vw] tracking-[0.2em] uppercase" style={{ color: "#C9A84C" }}>Mobile Application</span>
            <div className="h-[0.2vh] w-[4vw]" style={{ background: "#C9A84C" }} />
          </div>
          <h1 className="font-display text-[5.5vw] leading-[1.05] font-bold tracking-tight" style={{ color: "#F5F0FF" }}>
            Blessings School
          </h1>
          <h1 className="font-display text-[5.5vw] leading-[1.05] font-bold tracking-tight" style={{ color: "#C9A84C" }}>
            of Hypnosis
          </h1>
          <p className="mt-[3vh] text-[2vw] leading-relaxed max-w-[55vw]" style={{ color: "rgba(245,240,255,0.7)" }}>
            Full architecture, component map, API reference, and feature overview for the Expo React Native mobile application.
          </p>
        </div>
      </div>
      <div className="absolute bottom-[5vh] left-[8vw] right-[8vw] flex items-center justify-between">
        <div className="flex items-center gap-[2vw]">
          <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.2vw] font-medium" style={{ background: "rgba(123,47,190,0.3)", color: "#F5F0FF", border: "1px solid rgba(123,47,190,0.5)" }}>React Native</div>
          <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.2vw] font-medium" style={{ background: "rgba(0,201,177,0.2)", color: "#F5F0FF", border: "1px solid rgba(0,201,177,0.4)" }}>Expo Router</div>
          <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.2vw] font-medium" style={{ background: "rgba(201,168,76,0.2)", color: "#F5F0FF", border: "1px solid rgba(201,168,76,0.4)" }}>TypeScript</div>
        </div>
        <div className="text-[1.2vw]" style={{ color: "rgba(245,240,255,0.4)" }}>Slide 1 of 10</div>
      </div>
    </div>
  );
}
