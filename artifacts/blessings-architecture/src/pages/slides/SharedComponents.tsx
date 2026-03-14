export default function SharedComponents() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(160deg, #0D0520 0%, #1A0A3C 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 10% 80%, rgba(0,201,177,0.12) 0%, transparent 40%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #00C9B1, #7B2FBE, #C9A84C)" }} />
      <div className="relative flex h-full px-[6vw] py-[5vh] gap-[5vw]">
        <div className="flex flex-col" style={{ minWidth: "38vw" }}>
          <div className="mb-[3.5vh]">
            <div className="text-[1.2vw] tracking-[0.2em] uppercase mb-[0.8vh]" style={{ color: "#C9A84C" }}>Used by every screen</div>
            <h2 className="font-display text-[3.2vw] font-bold leading-tight" style={{ color: "#F5F0FF" }}>Shared Components</h2>
            <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
          </div>
          <p className="text-[1.5vw] leading-relaxed mb-[4vh]" style={{ color: "rgba(245,240,255,0.7)" }}>
            These components are imported by every screen in the app. They provide the consistent visual foundation — the dark cosmic background, safety net error handling, and the unified color theme.
          </p>
          <div className="rounded-2xl p-[2vw]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.1)" }}>
            <div className="text-[1.3vw] font-semibold mb-[1.5vh]" style={{ color: "rgba(245,240,255,0.6)" }}>components/ folder</div>
            <div className="flex flex-col gap-[1vh]">
              <div className="font-mono text-[1.25vw]" style={{ color: "#C9A84C" }}>GradientBackground.tsx</div>
              <div className="font-mono text-[1.25vw]" style={{ color: "#C9A84C" }}>ErrorBoundary.tsx</div>
              <div className="font-mono text-[1.25vw]" style={{ color: "#C9A84C" }}>ErrorFallback.tsx</div>
            </div>
          </div>
        </div>
        <div className="flex flex-col gap-[2.5vh] flex-1">
          <div className="rounded-2xl p-[2.2vw] flex-1" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)" }}>
            <div className="text-[1.8vw] font-bold font-display mb-[1.2vh]" style={{ color: "#C9B1F5" }}>GradientBackground</div>
            <div className="text-[1.3vw] leading-relaxed mb-[1.5vh]" style={{ color: "rgba(245,240,255,0.75)" }}>Renders the deep indigo-to-navy gradient canvas with 3 animated floating orb decorations. Wraps every screen's content as the base layer.</div>
            <div className="flex flex-wrap gap-[0.8vw]">
              <div className="px-[1vw] py-[0.4vh] rounded text-[1.1vw]" style={{ background: "rgba(245,240,255,0.08)", color: "rgba(245,240,255,0.6)" }}>Background gradient</div>
              <div className="px-[1vw] py-[0.4vh] rounded text-[1.1vw]" style={{ background: "rgba(245,240,255,0.08)", color: "rgba(245,240,255,0.6)" }}>Floating orbs</div>
              <div className="px-[1vw] py-[0.4vh] rounded text-[1.1vw]" style={{ background: "rgba(245,240,255,0.08)", color: "rgba(245,240,255,0.6)" }}>Safe area insets</div>
            </div>
          </div>
          <div className="rounded-2xl p-[2.2vw]" style={{ background: "rgba(0,201,177,0.12)", border: "1px solid rgba(0,201,177,0.3)" }}>
            <div className="text-[1.8vw] font-bold font-display mb-[1.2vh]" style={{ color: "#00C9B1" }}>ErrorBoundary + ErrorFallback</div>
            <div className="text-[1.3vw] leading-relaxed mb-[1.5vh]" style={{ color: "rgba(245,240,255,0.75)" }}>React class-based crash recovery wrapper. If any screen throws an unhandled error, ErrorFallback renders a styled recovery UI with a reload button instead of a blank screen.</div>
            <div className="flex flex-wrap gap-[0.8vw]">
              <div className="px-[1vw] py-[0.4vh] rounded text-[1.1vw]" style={{ background: "rgba(245,240,255,0.08)", color: "rgba(245,240,255,0.6)" }}>Crash recovery</div>
              <div className="px-[1vw] py-[0.4vh] rounded text-[1.1vw]" style={{ background: "rgba(245,240,255,0.08)", color: "rgba(245,240,255,0.6)" }}>Reload button</div>
              <div className="px-[1vw] py-[0.4vh] rounded text-[1.1vw]" style={{ background: "rgba(245,240,255,0.08)", color: "rgba(245,240,255,0.6)" }}>Error logging</div>
            </div>
          </div>
          <div className="text-right text-[1.1vw]" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 7 of 10</div>
        </div>
      </div>
    </div>
  );
}
