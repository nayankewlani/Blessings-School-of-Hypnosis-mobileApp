export default function AppOverview() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(160deg, #0D0520 0%, #1A0A3C 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 90% 10%, rgba(0,201,177,0.12) 0%, transparent 40%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #7B2FBE, #C9A84C, #00C9B1)" }} />
      <div className="relative flex flex-col h-full px-[7vw] py-[6vh]">
        <div className="mb-[4vh]">
          <div className="text-[1.3vw] tracking-[0.2em] uppercase mb-[1.5vh]" style={{ color: "#C9A84C" }}>What is this app?</div>
          <h2 className="font-display text-[4vw] font-bold leading-tight" style={{ color: "#F5F0FF" }}>App Overview</h2>
          <div className="mt-[1.5vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
        </div>
        <p className="text-[1.7vw] max-w-[75vw] mb-[5vh]" style={{ color: "rgba(245,240,255,0.75)" }}>
          A full-featured spiritual wellness mobile app combining Vedic astrology, guided hypnosis, numerology, tarot, and meditation — all offline, no backend required.
        </p>
        <div className="grid grid-cols-3 gap-[2.5vw] flex-1">
          <div className="rounded-2xl p-[2.5vw] flex flex-col gap-[1.5vh]" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)" }}>
            <div className="text-[3vw]">🔮</div>
            <div className="text-[1.8vw] font-bold font-display" style={{ color: "#C9A84C" }}>Astrology</div>
            <div className="text-[1.4vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Daily horoscopes, birth chart (Kundali), numerology life path, tarot card readings, and Panchang Hindu calendar</div>
          </div>
          <div className="rounded-2xl p-[2.5vw] flex flex-col gap-[1.5vh]" style={{ background: "rgba(0,201,177,0.15)", border: "1px solid rgba(0,201,177,0.35)" }}>
            <div className="text-[3vw]">🌙</div>
            <div className="text-[1.8vw] font-bold font-display" style={{ color: "#00C9B1" }}>Hypnosis</div>
            <div className="text-[1.4vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Guided hypnosis sessions with breathing exercises, animated timers, and a full session player modal with progress tracking</div>
          </div>
          <div className="rounded-2xl p-[2.5vw] flex flex-col gap-[1.5vh]" style={{ background: "rgba(201,168,76,0.15)", border: "1px solid rgba(201,168,76,0.35)" }}>
            <div className="text-[3vw]">✨</div>
            <div className="text-[1.8vw] font-bold font-display" style={{ color: "#F0C96A" }}>Wellness</div>
            <div className="text-[1.4vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Guided meditation with animated timer, personalized user profile persisted locally, and curated spiritual content library</div>
          </div>
        </div>
        <div className="mt-[3vh] text-[1.2vw] text-right" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 2 of 10</div>
      </div>
    </div>
  );
}
