
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Advanced Web Dashboard</title>
  <style>
    :root {
      --bg-primary: #0f172a;
      --bg-secondary: #1e293b;
      --text-primary: #f8fafc;
      --text-secondary: #94a3b8;
      --accent: #6366f1;
      --accent-hover: #4f46e5;
      --border: #334155;
      --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
    }

    [data-theme="light"] {
      --bg-primary: #f8fafc;
      --bg-secondary: #ffffff;
      --text-primary: #0f172a;
      --text-secondary: #64748b;
      --border: #e2e8f0;
      --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    body {
      background-color: var(--bg-primary);
      color: var(--text-primary);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    header {
      background-color: var(--bg-secondary);
      border-bottom: 1px solid var(--border);
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .brand {
      font-weight: 700;
      font-size: 1.25rem;
      color: var(--accent);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .controls {
      display: flex;
      gap: 1rem;
      align-items: center;
    }

    input[type="search"] {
      background: var(--bg-primary);
      border: 1px solid var(--border);
      color: var(--text-primary);
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      outline: none;
    }

    input[type="search"]:focus {
      border-color: var(--accent);
    }

    button {
      background-color: var(--accent);
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      cursor: pointer;
      font-weight: 600;
    }

    button:hover {
      background-color: var(--accent-hover);
    }

    main {
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
      width: 100%;
      flex: 1;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1.5rem;
      margin-top: 1.5rem;
    }

    .card {
      background-color: var(--bg-secondary);
      border: 1px solid var(--border);
      border-radius: 0.5rem;
      padding: 1.5rem;
      box-shadow: var(--card-shadow);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card h3 {
      font-size: 1.1rem;
      margin-bottom: 0.5rem;
    }

    .card p {
      color: var(--text-secondary);
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }

    .card-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.8rem;
      color: var(--text-secondary);
    }

    .tag {
      background: rgba(99, 102, 241, 0.15);
      color: var(--accent);
      padding: 0.25rem 0.5rem;
      border-radius: 0.25rem;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <header>
    <div class="brand">⚡ NexusDash</div>
    <div class="controls">
      <input type="search" id="searchInput" placeholder="Search modules..." />
      <button id="themeToggle">Toggle Theme</button>
    </div>
  </header>

  <main>
    <h2>Subject Overview</h2>
    <div class="grid" id="cardContainer"></div>
  </main>

  <script>
    
    const state = {
      theme: localStorage.getItem('theme') || 'dark',
      searchQuery: '',
      items: [
        { title: 'English', desc: 'Focuses on reading and communication skills.', tag: 'Backend', updated: '2m ago' },
        { title: 'Mathematics', desc: 'real-life problem solving.', tag: 'Data', updated: '1h ago' },
        { title: 'Science', desc: 'focuses on discovering.', tag: 'Frontend', updated: '1d ago' },
        { title: 'Filipino', desc: 'panitikan at kulturang pilipino.', tag: 'Integration', updated: '3d ago' },
        { title: 'Araling Panlipunan', desc: 'about past.', tag: 'DevOps', updated: '5d ago' }
      ]
    };

    const themeToggleBtn = document.getElementById('themeToggle');
    const searchInput = document.getElementById('searchInput');
    const cardContainer = document.getElementById('cardContainer');

    
    function applyTheme(theme) {
      document.documentElement.setAttribute('data-theme', theme);
      localStorage.setItem('theme', theme);
      state.theme = theme;
    }

    themeToggleBtn.addEventListener('click', () => {
      applyTheme(state.theme === 'dark' ? 'light' : 'dark');
    });

    
    function render() {
      const filtered = state.items.filter(item => 
        item.title.toLowerCase().includes(state.searchQuery.toLowerCase()) ||
        item.desc.toLowerCase().includes(state.searchQuery.toLowerCase())
      );

      cardContainer.innerHTML = filtered.map(item => `
        <article class="card">
          <div>
            <h3>${item.title}</h3>
            <p>${item.desc}</p>
          </div>
          <div class="card-footer">
            <span class="tag">${item.tag}</span>
            <span>Updated ${item.updated}</span>
          </div>
        </article>
      `).join('');
    }

    
    searchInput.addEventListener('input', (e) => {
      state.searchQuery = e.target.value;
      render();
    });

    
    applyTheme(state.stateTheme || state.theme);
    render();
  </script>
</body>
</html>