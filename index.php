<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer | Campaign Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --rose: #c2185b;
            --rose-dark: #880e4f;
            --rose-light: #fce4ec;
            --plum: #6a1b9a;
            --ink: #1a0a0f;
            --muted: #7a5a66;
            --surface: #fff8f9;
            --white: #ffffff;
            --card-border: #f3c4d4;
        }

        body {
            background: var(--surface);
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
            min-height: 100vh;
        }

        /* ── Header ── */
        .header {
            background: var(--white);
            border-bottom: 1px solid var(--card-border);
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: var(--rose);
            letter-spacing: -0.5px;
        }
        .logo span { font-style: italic; color: var(--plum); }
        .nav-links { display: flex; gap: 24px; font-size: 13px; }
        .nav-links a { text-decoration: none; color: var(--muted); transition: color 0.2s; }
        .nav-links a:hover { color: var(--rose); }

        /* ── Layout ── */
        .main {
            display: grid;
            grid-template-columns: 380px 1fr;
            min-height: calc(100vh - 64px);
        }

        /* ── Sidebar / Form ── */
        .sidebar {
            background: var(--white);
            border-right: 1px solid var(--card-border);
            padding: 36px 32px;
            position: sticky;
            top: 64px;
            height: calc(100vh - 64px);
            overflow-y: auto;
        }
        .sidebar-title {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            line-height: 1.25;
            margin-bottom: 8px;
        }
        .sidebar-title em { font-style: italic; color: var(--rose); }
        .tagline {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 28px;
            line-height: 1.7;
        }

        /* Stats */
        .stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 28px;
        }
        .stat {
            background: var(--rose-light);
            border-radius: 12px;
            padding: 14px 16px;
        }
        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: var(--rose);
            display: block;
        }
        .stat-label {
            font-size: 11px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* Form */
        .form-section-title {
            font-size: 12px;
            font-weight: 500;
            color: var(--ink);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .form-section-title::before {
            content: '';
            display: block;
            width: 20px;
            height: 2px;
            background: var(--rose);
        }
        .field { margin-bottom: 16px; }
        .field label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.7px;
            margin-bottom: 6px;
        }
        .field input,
        .field textarea,
        .field select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--card-border);
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--ink);
            background: var(--surface);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            border-color: var(--rose);
            box-shadow: 0 0 0 3px rgba(194, 24, 91, 0.08);
        }
        .field textarea { resize: vertical; min-height: 90px; }
        .submit-btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--rose), var(--plum));
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.3px;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.2s;
        }
        .submit-btn:hover { opacity: 0.9; transform: translateY(-1px); }
        .submit-btn:active { transform: translateY(0); }

        /* Flash messages */
        .flash {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
        }
        .flash-success { background: #e8f5e9; color: #2e7d32; border: 1px solid #a5d6a7; }
        .flash-error { background: #ffebee; color: #c62828; border: 1px solid #ef9a9a; }

        /* ── Content / Campaign List ── */
        .content { padding: 36px 40px; }
        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }
        .content-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
        }
        .filter-tabs { display: flex; gap: 8px; flex-wrap: wrap; }
        .tab {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            border: 1px solid var(--card-border);
            color: var(--muted);
            cursor: pointer;
            background: var(--white);
            transition: all 0.2s;
            font-family: 'DM Sans', sans-serif;
        }
        .tab:hover { border-color: var(--rose); color: var(--rose); }
        .tab.active { background: var(--rose); color: #fff; border-color: var(--rose); }

        /* Cards */
        .campaigns { display: grid; gap: 16px; }
        .card {
            background: var(--white);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            opacity: 0;
            transform: translateY(20px);
            transition: transform 0.4s ease, box-shadow 0.3s ease, opacity 0.4s ease;
        }
        .card.reveal { opacity: 1; transform: translateY(0); }
        .card:hover { transform: translateY(-4px); box-shadow: 0 14px 36px rgba(194, 24, 91, 0.1); }
        .card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 14px;
        }
        .badge {
            font-size: 10px;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }
        .badge-Business { background: #e8f5e9; color: #2e7d32; }
        .badge-Health   { background: #fff3e0; color: #e65100; }
        .badge-Education{ background: #e3f2fd; color: #0d47a1; }
        .badge-Advocacy { background: #f3e5f5; color: #6a1b9a; }
        .card-date { font-size: 11px; color: var(--muted); }
        .card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            margin-bottom: 8px;
            line-height: 1.3;
        }
        .card p { font-size: 13px; color: var(--muted); line-height: 1.7; }
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid var(--card-border);
        }
        .view-btn {
            font-size: 12px;
            color: var(--rose);
            font-weight: 500;
            cursor: pointer;
            border: none;
            background: none;
            font-family: 'DM Sans', sans-serif;
            padding: 6px 14px;
            border-radius: 8px;
            transition: background 0.2s;
        }
        .view-btn:hover { background: var(--rose-light); }
        .no-campaigns {
            text-align: center;
            color: var(--muted);
            padding: 48px 0;
            font-size: 14px;
        }
        .no-campaigns p:first-child { font-size: 32px; margin-bottom: 8px; }

        /* Responsive */
        @media (max-width: 768px) {
            .main { grid-template-columns: 1fr; }
            .sidebar {
                position: static;
                height: auto;
                border-right: none;
                border-bottom: 1px solid var(--card-border);
            }
            .content { padding: 24px 20px; }
            .header { padding: 0 20px; }
        }
    </style>
</head>
<body>

<header class="header">
    <div class="logo">Empower<span>Her</span></div>
    <nav class="nav-links">
        <a href="index.php" class="active">Campaigns</a>
        <a href="about.php">About</a>
        <a href="stories.php">Stories</a>
        <a href="connect.php">Connect</a>
    </nav>
</header>

<div class="main">

    <!-- ── Sidebar ── -->
    <aside class="sidebar">
        <h1 class="sidebar-title">Where women-led <em>ideas</em><br>become movements</h1>
        <p class="tagline">Launch your initiative, find your community, and drive meaningful change.</p>

        <?php
        /* ── Stats from DB ── */
        include 'db_connect.php';
        $total = $conn->query("SELECT COUNT(*) AS cnt FROM campaigns")->fetch_assoc()['cnt'] ?? 0;
        ?>

        <div class="stats">
            <div class="stat">
                <span class="stat-num"><?= $total ?>+</span>
                <span class="stat-label">Campaigns</span>
            </div>
            <div class="stat">
                <span class="stat-num">150+</span>
                <span class="stat-label">Supporters</span>
            </div>
            <div class="stat">
                <span class="stat-num">18</span>
                <span class="stat-label">Cities</span>
            </div>
            <div class="stat">
                <span class="stat-num">9</span>
                <span class="stat-label">Wins</span>
            </div>
        </div>

        <?php
        /* ── Flash message after redirect ── */
        if (isset($_GET['status'])) {
            if ($_GET['status'] === 'success') {
                echo '<div class="flash flash-success">✓ Your campaign has been launched!</div>';
            } elseif ($_GET['status'] === 'error') {
                echo '<div class="flash flash-error">✕ Something went wrong. Please try again.</div>';
            }
        }
        ?>

        <!-- Launch form -->
        <p class="form-section-title">Launch your initiative</p>
        <form action="process.php" method="POST" novalidate>
            <div class="field">
                <label for="title">Campaign Title</label>
                <input type="text" id="title" name="title" required maxlength="200" placeholder="Name your cause…">
            </div>
            <div class="field">
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="Business">Business &amp; Tech</option>
                    <option value="Health">Health &amp; Wellness</option>
                    <option value="Education">Education</option>
                    <option value="Advocacy">Social Advocacy</option>
                </select>
            </div>
            <div class="field">
                <label for="description">Your Story</label>
                <textarea id="description" name="description" required maxlength="2000" placeholder="Tell us what you're fighting for…"></textarea>
            </div>
            <button type="submit" name="submit" class="submit-btn">Launch Initiative →</button>
        </form>
    </aside>

    <!-- ── Main Content ── -->
    <main class="content">
        <div class="content-header">
            <h2>Ongoing Campaigns</h2>
            <div class="filter-tabs">
                <button class="tab active" data-filter="all">All</button>
                <button class="tab" data-filter="Business">Business</button>
                <button class="tab" data-filter="Health">Health</button>
                <button class="tab" data-filter="Education">Education</button>
                <button class="tab" data-filter="Advocacy">Advocacy</button>
            </div>
        </div>

        <div class="campaigns" id="campaign-list">
            <?php include 'fetch.php'; ?>
        </div>
    </main>

</div>

<script>
    /* ── Scroll-reveal for cards ── */
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('reveal');
        });
    }, { threshold: 0.08 });
    document.querySelectorAll('.card').forEach(c => observer.observe(c));

    /* ── Client-side category filter ── */
    document.querySelectorAll('.tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const filter = tab.dataset.filter;
            document.querySelectorAll('.card').forEach(card => {
                const match = filter === 'all' || card.dataset.category === filter;
                card.style.display = match ? '' : 'none';
            });
        });
    });
</script>
</body>
</html>