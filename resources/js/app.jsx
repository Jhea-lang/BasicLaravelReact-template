import { useState } from 'react'

export default function App() {
  const [active, setActive] = useState('Dashboard')
  const links = ['Dashboard', 'Modules', 'API Docs', 'Analytics', 'Settings']

  return (
    <header className="flex justify-between items-center px-8 py-3 sticky top-0 z-50"
      style={{ backgroundColor: '#1e3a5f', borderBottom: '1px solid #2a5a80' }}>

    
      <div className="flex items-center gap-10">
        <div className="font-bold text-lg" style={{ color: '#60a5fa' }}>
          ⚡ NexusDash
        </div>

        <nav className="flex gap-2">
          {links.map((link) => (
            <a
              key={link}
              onClick={() => setActive(link)}
              className={`px-3 py-1.5 rounded-md text-sm font-semibold cursor-pointer
                ${active === link ? 'text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800'}`}
              style={active === link ? { backgroundColor: '#3b82f6' } : {}}
            >
              {link}
            </a>
          ))}
        </nav>
      </div>

      
      <div className="flex gap-3">
        <input
          type="search"
          placeholder="Search modules..."
          className="px-4 py-1.5 rounded-md text-sm outline-none"
          style={{ backgroundColor: '#0f172a', border: '1px solid #2a5a80', color: 'white' }}
        />
        <button
          className="px-4 py-1.5 rounded-md text-sm font-semibold text-white"
          style={{ backgroundColor: '#3b82f6' }}
        >
          Toggle Theme
        </button>
      </div>
    </header>
  )
}
