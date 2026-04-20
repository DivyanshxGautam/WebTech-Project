<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer | About</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --rose: #c2185b; --rose-light: #fce4ec; --plum: #6a1b9a;
            --ink: #1a0a0f; --muted: #7a5a66; --surface: #fff8f9;
            --white: #ffffff; --card-border: #f3c4d4;
        }
        body { background: var(--surface); font-family: 'DM Sans', sans-serif; color: var(--ink); }

        .header {
            background: var(--white); border-bottom: 1px solid var(--card-border);
            padding: 0 40px; display: flex; align-items: center;
            justify-content: space-between; height: 64px; position: sticky; top: 0; z-index: 50;
        }
        .logo { font-family: 'Playfair Display', serif; font-size: 22px; color: var(--rose); text-decoration: none; }
        .logo span { font-style: italic; color: var(--plum); }
        .nav-links { display: flex; gap: 24px; font-size: 13px; }
        .nav-links a { text-decoration: none; color: var(--muted); transition: color 0.2s; }
        .nav-links a:hover, .nav-links a.active { color: var(--rose); font-weight: 500; }

        /* Hero */
        .hero {
            background: linear-gradient(135deg, var(--rose-light) 0%, #f3e5f5 100%);
            padding: 80px 40px 60px;
            text-align: center;
            border-bottom: 1px solid var(--card-border);
        }
        .hero-tag {
            display: inline-block; font-size: 11px; font-weight: 500; letter-spacing: 1.2px;
            text-transform: uppercase; color: var(--rose); margin-bottom: 16px;
            background: var(--white); padding: 5px 14px; border-radius: 20px;
            border: 1px solid var(--card-border);
        }
        .hero h1 {
            font-family: 'Playfair Display', serif; font-size: 44px;
            line-height: 1.15; color: var(--ink); max-width: 600px; margin: 0 auto 16px;
        }
        .hero h1 em { font-style: italic; color: var(--rose); }
        .hero p { font-size: 15px; color: var(--muted); max-width: 480px; margin: 0 auto; line-height: 1.8; }

        /* Sections */
        .section { max-width: 900px; margin: 0 auto; padding: 64px 24px; }
        .section-label {
            font-size: 11px; font-weight: 500; text-transform: uppercase;
            letter-spacing: 0.9px; color: var(--rose); margin-bottom: 12px;
            display: flex; align-items: center; gap: 8px;
        }
        .section-label::before { content: ''; display: block; width: 16px; height: 2px; background: var(--rose); }
        .section h2 {
            font-family: 'Playfair Display', serif; font-size: 32px;
            color: var(--ink); margin-bottom: 20px; line-height: 1.2;
        }
        .section h2 em { font-style: italic; color: var(--rose); }
        .section p { font-size: 15px; color: var(--muted); line-height: 1.85; max-width: 640px; }

        /* Mission / Vision cards */
        .mv-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 36px; }
        .mv-card {
            background: var(--white); border: 1px solid var(--card-border);
            border-radius: 18px; padding: 32px;
        }
        .mv-icon { font-size: 28px; margin-bottom: 14px; }
        .mv-card h3 { font-family: 'Playfair Display', serif; font-size: 20px; margin-bottom: 10px; }
        .mv-card p { font-size: 13px; color: var(--muted); line-height: 1.8; }

        /* Values */
        .values-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 36px; }
        .value-item {
            background: var(--rose-light); border-radius: 14px; padding: 24px 20px; text-align: center;
        }
        .value-item .v-icon { font-size: 22px; margin-bottom: 10px; }
        .value-item h4 { font-size: 14px; font-weight: 500; color: var(--ink); margin-bottom: 6px; }
        .value-item p { font-size: 12px; color: var(--muted); line-height: 1.6; }

        /* Divider */
        .divider { border: none; border-top: 1px solid var(--card-border); max-width: 900px; margin: 0 auto; }

        /* Team */
        .team-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; margin-top: 36px; }
        .team-card {
            background: var(--white); border: 1px solid var(--card-border);
            border-radius: 18px; padding: 28px 20px; text-align: center;
            transition: transform 0.25s, box-shadow 0.25s;
        }
        .team-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(194,24,91,0.1); }
        .avatar {
            width: 68px; height: 68px; border-radius: 50%;
            background: linear-gradient(135deg, var(--rose-light), #f3e5f5);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Playfair Display', serif; font-size: 22px; color: var(--rose);
            margin: 0 auto 14px; border: 2px solid var(--card-border);
        }
        .team-card h4 { font-size: 15px; font-weight: 500; color: var(--ink); margin-bottom: 4px; }
        .team-card .role { font-size: 12px; color: var(--rose); margin-bottom: 8px; }
        .team-card .bio { font-size: 12px; color: var(--muted); line-height: 1.6; }

        @media (max-width: 680px) {
            .mv-grid, .values-grid { grid-template-columns: 1fr; }
            .hero h1 { font-size: 30px; }
            .header { padding: 0 20px; }
        }
    </style>
</head>
<body>

<header class="header">
    <a href="index.php" class="logo">Empower<span>Her</span></a>
    <nav class="nav-links">
        <a href="index.php">Campaigns</a>
        <a href="about.php" class="active">About</a>
        <a href="stories.php">Stories</a>
        <a href="connect.php">Connect</a>
    </nav>
</header>

<!-- Hero -->
<section class="hero">
    <div class="hero-tag">Our Story</div>
    <h1>Built by women, <em>for</em> every woman</h1>
    <p>EmpowerHer was born from a simple belief — that every woman deserves a platform to turn her vision into a movement.</p>
</section>

<!-- Mission & Vision -->
<section class="section">
    <p class="section-label">Why we exist</p>
    <h2>Our <em>Mission</em> & Vision</h2>
    <p>We believe systemic change starts with individual voices. EmpowerHer provides the tools, community, and visibility for women to lead campaigns that matter.</p>

    <div class="mv-grid">
        <div class="mv-card">
            <div class="mv-icon">🎯</div>
            <h3>Mission</h3>
            <p>To create an inclusive digital space where women can launch, grow, and win campaigns across business, health, education, and social advocacy — with zero barriers to entry.</p>
        </div>
        <div class="mv-card">
            <div class="mv-icon">🌅</div>
            <h3>Vision</h3>
            <p>A world where every woman-led initiative has the support, resources, and community it deserves — and where female leadership is the norm, not the exception.</p>
        </div>
    </div>

    <div class="values-grid" style="margin-top: 20px;">
        <div class="value-item">
            <div class="v-icon">💡</div>
            <h4>Courage</h4>
            <p>We celebrate bold ideas and the women brave enough to pursue them.</p>
        </div>
        <div class="value-item">
            <div class="v-icon">🤝</div>
            <h4>Community</h4>
            <p>Strength in solidarity — every supporter matters.</p>
        </div>
        <div class="value-item">
            <div class="v-icon">🔓</div>
            <h4>Access</h4>
            <p>Free, open, and available to any woman, anywhere.</p>
        </div>
    </div>
</section>

<hr class="divider">

<!-- Team -->
<section class="section">
    <p class="section-label">The people behind it</p>
    <h2>Meet the <em>Team</em></h2>
    <p>A small but mighty group of builders, dreamers, and advocates who believe in the power of women-led change.</p>

    <div class="team-grid">
        <div class="team-card">
            <div class="avatar">DG</div>
            <h4>Divyansh Kumar Gautam</h4>
            <div class="role">Team Lead</div>
            <p class="bio">Leads the EmpowerHer vision, driving strategy and growth across every initiative.</p>
        </div>
        <div class="team-card">
            <div class="avatar">DP</div>
            <h4>Divyansh Pandey</h4>
            <div class="role">Partnerships</div>
            <p class="bio">Brings in organisations that fund and amplify winning campaigns.</p>
        </div>
        <div class="team-card">
            <div class="avatar">AC</div>
            <h4>Ayush Kumar Chaubey</h4>
            <div class="role">Partnerships</div>
            <p class="bio">Builds and nurtures key partnerships that expand EmpowerHer's reach and impact.</p>
        </div>
    </div>
</section>

</body>
</html>