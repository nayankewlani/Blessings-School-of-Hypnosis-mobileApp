export default function NavigationArch() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(160deg, #0D0520 0%, #1A0A3C 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 95% 80%, rgba(201,168,76,0.12) 0%, transparent 40%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #00C9B1, #7B2FBE, #C9A84C)" }} />
      <div className="relative flex h-full px-[6vw] py-[5vh] gap-[4vw]">
        <div className="flex flex-col flex-1">
          <div className="mb-[3vh]">
            <div className="text-[1.2vw] tracking-[0.2em] uppercase mb-[0.8vh]" style={{ color: "#C9A84C" }}>How screens connect</div>
            <h2 className="font-display text-[3.2vw] font-bold leading-tight" style={{ color: "#F5F0FF" }}>Navigation Architecture</h2>
            <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
          </div>
          <div className="flex flex-col gap-[2.5vh]">
            <div className="rounded-2xl p-[2vw]" style={{ background: "rgba(201,168,76,0.15)", border: "1px solid rgba(201,168,76,0.35)" }}>
              <div className="text-[1.5vw] font-bold mb-[1vh]" style={{ color: "#F0C96A" }}>📁 File-based Routing</div>
              <div className="text-[1.35vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.75)" }}>Every file inside <span className="font-mono px-[0.5vw] py-[0.2vh] rounded text-[1.2vw]" style={{ background: "rgba(245,240,255,0.1)", color: "#C9A84C" }}>app/</span> automatically becomes a navigable URL route — just like Next.js for mobile.</div>
            </div>
            <div className="rounded-2xl p-[2vw]" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)" }}>
              <div className="text-[1.5vw] font-bold mb-[1vh]" style={{ color: "#C9B1F5" }}>🗂 Stack Navigator</div>
              <div className="text-[1.35vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.75)" }}>Manages push/pop transitions between screens. Sub-screens like <span style={{ color: "#C9A84C" }}>horoscope/[sign]</span> slide in from the right on top of the tab bar.</div>
            </div>
            <div className="rounded-2xl p-[2vw]" style={{ background: "rgba(0,201,177,0.15)", border: "1px solid rgba(0,201,177,0.35)" }}>
              <div className="text-[1.5vw] font-bold mb-[1vh]" style={{ color: "#00C9B1" }}>📌 Tab Navigator</div>
              <div className="text-[1.35vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.75)" }}>Lives inside the Stack as a child. Renders the 5 main tabs persistently. On iOS 26+ uses liquid glass native tabs; on Android uses a styled solid tab bar.</div>
            </div>
          </div>
        </div>
        <div className="flex flex-col justify-center gap-[2vh]" style={{ minWidth: "32vw" }}>
          <div className="text-[1.3vw] font-semibold mb-[1vh]" style={{ color: "rgba(245,240,255,0.6)" }}>Route Examples</div>
          <div className="flex flex-col gap-[1.5vh]">
            <div className="rounded-xl px-[1.5vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="font-mono text-[1.15vw]" style={{ color: "#C9A84C" }}>app/(tabs)/index.tsx</div>
              <div className="text-[1.1vw] mt-[0.3vh]" style={{ color: "rgba(245,240,255,0.55)" }}>→ Home tab screen</div>
            </div>
            <div className="rounded-xl px-[1.5vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="font-mono text-[1.15vw]" style={{ color: "#C9A84C" }}>app/horoscope/[sign].tsx</div>
              <div className="text-[1.1vw] mt-[0.3vh]" style={{ color: "rgba(245,240,255,0.55)" }}>→ Dynamic: /horoscope/aries</div>
            </div>
            <div className="rounded-xl px-[1.5vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="font-mono text-[1.15vw]" style={{ color: "#C9A84C" }}>app/kundali/index.tsx</div>
              <div className="text-[1.1vw] mt-[0.3vh]" style={{ color: "rgba(245,240,255,0.55)" }}>→ Birth chart screen</div>
            </div>
            <div className="rounded-xl px-[1.5vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="font-mono text-[1.15vw]" style={{ color: "#C9A84C" }}>app/meditation/index.tsx</div>
              <div className="text-[1.1vw] mt-[0.3vh]" style={{ color: "rgba(245,240,255,0.55)" }}>→ Guided meditation player</div>
            </div>
            <div className="rounded-xl px-[1.5vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="font-mono text-[1.15vw]" style={{ color: "#C9A84C" }}>app/+not-found.tsx</div>
              <div className="text-[1.1vw] mt-[0.3vh]" style={{ color: "rgba(245,240,255,0.55)" }}>→ 404 fallback screen</div>
            </div>
          </div>
          <div className="text-right text-[1.1vw] mt-[1vh]" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 4 of 10</div>
        </div>
      </div>
    </div>
  );
}
