export default function ComponentMap() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(160deg, #0D0520 0%, #1A0A3C 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 5% 50%, rgba(123,47,190,0.12) 0%, transparent 40%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #C9A84C, #7B2FBE, #00C9B1)" }} />
      <div className="relative flex flex-col h-full px-[5vw] py-[4vh]">
        <div className="mb-[2.5vh]">
          <div className="text-[1.2vw] tracking-[0.2em] uppercase mb-[0.8vh]" style={{ color: "#C9A84C" }}>Visual Component Map</div>
          <h2 className="font-display text-[3.2vw] font-bold" style={{ color: "#F5F0FF" }}>Complete Component Hierarchy</h2>
          <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
        </div>
        <div className="flex flex-col items-center gap-[1.2vh] flex-1">
          <div className="flex justify-center w-full">
            <div className="px-[3vw] py-[1.2vh] rounded-xl text-[1.4vw] font-bold text-center" style={{ background: "rgba(123,47,190,0.5)", border: "2px solid #7B2FBE", color: "#F5F0FF", minWidth: "22vw" }}>
              _layout.tsx · Root Layout
            </div>
          </div>
          <div className="text-[2vh]" style={{ color: "rgba(245,240,255,0.4)" }}>▼</div>
          <div className="flex justify-center gap-[2vw] w-full">
            <div className="px-[2vw] py-[1vh] rounded-lg text-[1.25vw] text-center" style={{ background: "rgba(0,201,177,0.2)", border: "1px solid rgba(0,201,177,0.5)", color: "#00C9B1", minWidth: "18vw" }}>UserProvider · UserContext</div>
            <div className="px-[2vw] py-[1vh] rounded-lg text-[1.25vw] text-center" style={{ background: "rgba(0,201,177,0.2)", border: "1px solid rgba(0,201,177,0.5)", color: "#00C9B1", minWidth: "18vw" }}>QueryClientProvider · TanStack</div>
          </div>
          <div className="text-[2vh]" style={{ color: "rgba(245,240,255,0.4)" }}>▼</div>
          <div className="flex justify-center w-full">
            <div className="px-[3vw] py-[1.2vh] rounded-xl text-[1.4vw] font-semibold text-center" style={{ background: "rgba(201,168,76,0.2)", border: "1px solid rgba(201,168,76,0.5)", color: "#F0C96A", minWidth: "22vw" }}>
              Stack Navigator · Expo Router
            </div>
          </div>
          <div className="text-[2vh]" style={{ color: "rgba(245,240,255,0.4)" }}>▼</div>
          <div className="flex justify-center w-full">
            <div className="px-[3vw] py-[1.2vh] rounded-xl text-[1.4vw] font-semibold text-center" style={{ background: "rgba(201,168,76,0.2)", border: "1px solid rgba(201,168,76,0.5)", color: "#F0C96A", minWidth: "22vw" }}>
              (tabs)/_layout.tsx · Tab Navigator
            </div>
          </div>
          <div className="text-[2vh]" style={{ color: "rgba(245,240,255,0.4)" }}>▼</div>
          <div className="flex justify-center gap-[1.2vw] w-full">
            <div className="px-[1.5vw] py-[1vh] rounded-lg text-[1.15vw] text-center" style={{ background: "rgba(245,240,255,0.08)", border: "1px solid rgba(245,240,255,0.2)", color: "#F5F0FF" }}>🏠 Home</div>
            <div className="px-[1.5vw] py-[1vh] rounded-lg text-[1.15vw] text-center" style={{ background: "rgba(245,240,255,0.08)", border: "1px solid rgba(245,240,255,0.2)", color: "#F5F0FF" }}>⭐ Horoscope</div>
            <div className="px-[1.5vw] py-[1vh] rounded-lg text-[1.15vw] text-center" style={{ background: "rgba(245,240,255,0.08)", border: "1px solid rgba(245,240,255,0.2)", color: "#F5F0FF" }}>✨ Services</div>
            <div className="px-[1.5vw] py-[1vh] rounded-lg text-[1.15vw] text-center" style={{ background: "rgba(245,240,255,0.08)", border: "1px solid rgba(245,240,255,0.2)", color: "#F5F0FF" }}>🌙 Hypnosis</div>
            <div className="px-[1.5vw] py-[1vh] rounded-lg text-[1.15vw] text-center" style={{ background: "rgba(245,240,255,0.08)", border: "1px solid rgba(245,240,255,0.2)", color: "#F5F0FF" }}>👤 Profile</div>
          </div>
          <div className="text-[2vh]" style={{ color: "rgba(245,240,255,0.4)" }}>▼</div>
          <div className="flex justify-center gap-[1vw] w-full">
            <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.1vw] text-center" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)", color: "rgba(245,240,255,0.8)" }}>horoscope/[sign]</div>
            <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.1vw] text-center" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)", color: "rgba(245,240,255,0.8)" }}>kundali/</div>
            <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.1vw] text-center" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)", color: "rgba(245,240,255,0.8)" }}>numerology/</div>
            <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.1vw] text-center" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)", color: "rgba(245,240,255,0.8)" }}>tarot/</div>
            <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.1vw] text-center" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)", color: "rgba(245,240,255,0.8)" }}>panchang/</div>
            <div className="px-[1.2vw] py-[0.8vh] rounded text-[1.1vw] text-center" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)", color: "rgba(245,240,255,0.8)" }}>meditation/</div>
          </div>
          <div className="flex justify-between w-full mt-[1vh] px-[1vw]">
            <div className="flex items-center gap-[2vw]">
              <div className="flex items-center gap-[0.6vw]"><div className="w-[1.5vw] h-[0.6vh] rounded" style={{ background: "#7B2FBE" }} /><span className="text-[1.1vw]" style={{ color: "rgba(245,240,255,0.6)" }}>Root/Provider</span></div>
              <div className="flex items-center gap-[0.6vw]"><div className="w-[1.5vw] h-[0.6vh] rounded" style={{ background: "#00C9B1" }} /><span className="text-[1.1vw]" style={{ color: "rgba(245,240,255,0.6)" }}>Navigation</span></div>
              <div className="flex items-center gap-[0.6vw]"><div className="w-[1.5vw] h-[0.6vh] rounded" style={{ background: "#C9A84C" }} /><span className="text-[1.1vw]" style={{ color: "rgba(245,240,255,0.6)" }}>Screen</span></div>
            </div>
            <div className="text-[1.1vw]" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 3 of 10</div>
          </div>
        </div>
      </div>
    </div>
  );
}
