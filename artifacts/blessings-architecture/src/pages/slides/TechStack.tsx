export default function TechStack() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(135deg, #0D0520 0%, #1A0A3C 50%, #0D0520 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 20% 80%, rgba(123,47,190,0.2) 0%, transparent 40%), radial-gradient(circle at 80% 20%, rgba(0,201,177,0.12) 0%, transparent 40%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #C9A84C, #7B2FBE, #00C9B1, #C9A84C)" }} />
      <div className="relative flex h-full px-[6vw] py-[4.5vh] gap-[4vw]">
        <div className="flex flex-col flex-1">
          <div className="mb-[2.5vh]">
            <div className="text-[1.2vw] tracking-[0.2em] uppercase mb-[0.8vh]" style={{ color: "#C9A84C" }}>Complete reference</div>
            <h2 className="font-display text-[3.2vw] font-bold" style={{ color: "#F5F0FF" }}>Tech Stack</h2>
            <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
          </div>
          <div className="flex flex-col gap-[1.2vh]">
            <div className="flex items-center gap-[1.5vw] rounded-xl px-[1.5vw] py-[1.1vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="text-[1.3vw] font-semibold" style={{ color: "#F0C96A", minWidth: "14vw" }}>Framework</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Expo (React Native) — Android, iOS, Web</div>
            </div>
            <div className="flex items-center gap-[1.5vw] rounded-xl px-[1.5vw] py-[1.1vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="text-[1.3vw] font-semibold" style={{ color: "#F0C96A", minWidth: "14vw" }}>Language</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>TypeScript — strict mode</div>
            </div>
            <div className="flex items-center gap-[1.5vw] rounded-xl px-[1.5vw] py-[1.1vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="text-[1.3vw] font-semibold" style={{ color: "#F0C96A", minWidth: "14vw" }}>Navigation</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Expo Router v6 — file-based routing</div>
            </div>
            <div className="flex items-center gap-[1.5vw] rounded-xl px-[1.5vw] py-[1.1vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="text-[1.3vw] font-semibold" style={{ color: "#F0C96A", minWidth: "14vw" }}>State</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>React Context + AsyncStorage (offline)</div>
            </div>
            <div className="flex items-center gap-[1.5vw] rounded-xl px-[1.5vw] py-[1.1vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="text-[1.3vw] font-semibold" style={{ color: "#F0C96A", minWidth: "14vw" }}>Data Fetching</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>TanStack React Query v5</div>
            </div>
            <div className="flex items-center gap-[1.5vw] rounded-xl px-[1.5vw] py-[1.1vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="text-[1.3vw] font-semibold" style={{ color: "#F0C96A", minWidth: "14vw" }}>Animations</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>React Native Animated API</div>
            </div>
            <div className="flex items-center gap-[1.5vw] rounded-xl px-[1.5vw] py-[1.1vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="text-[1.3vw] font-semibold" style={{ color: "#F0C96A", minWidth: "14vw" }}>Icons</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>@expo/vector-icons (Ionicons + MaterialCommunityIcons)</div>
            </div>
            <div className="flex items-center gap-[1.5vw] rounded-xl px-[1.5vw] py-[1.1vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="text-[1.3vw] font-semibold" style={{ color: "#F0C96A", minWidth: "14vw" }}>Package Mgr</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>pnpm workspace (monorepo)</div>
            </div>
          </div>
        </div>
        <div className="flex flex-col" style={{ minWidth: "34vw" }}>
          <div className="mb-[2.5vh]">
            <h2 className="font-display text-[3.2vw] font-bold" style={{ color: "#F5F0FF" }}>Key Features</h2>
            <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#00C9B1" }} />
          </div>
          <div className="flex flex-col gap-[1.3vh] flex-1">
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Daily horoscopes for all 12 zodiac signs with love, career, health aspects</div>
            </div>
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Vedic birth chart (Kundali) with planet positions and Dasha periods</div>
            </div>
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Numerology life path calculator with full meaning breakdown</div>
            </div>
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Interactive tarot with 78-card deck and 3D flip animation</div>
            </div>
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Hindu Panchang calendar with Tithi, Nakshatra, Muhurta times</div>
            </div>
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Guided hypnosis sessions with breathing animation and modal player</div>
            </div>
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Guided meditation with animated countdown timer and pulsing visual</div>
            </div>
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Fully offline — all data local, no login required, works anywhere</div>
            </div>
            <div className="flex items-start gap-[1vw]">
              <div className="text-[1.4vw] mt-[0.1vh]" style={{ color: "#C9A84C" }}>✦</div>
              <div className="text-[1.3vw]" style={{ color: "rgba(245,240,255,0.8)" }}>Profile persisted via AsyncStorage — remembers you between sessions</div>
            </div>
          </div>
          <div className="text-right text-[1.1vw] mt-[1.5vh]" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 10 of 10</div>
        </div>
      </div>
    </div>
  );
}
