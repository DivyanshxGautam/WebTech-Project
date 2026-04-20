<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer | Stories</title>
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
            padding: 80px 40px 60px; text-align: center;
            border-bottom: 1px solid var(--card-border);
        }
        .hero-tag {
            display: inline-block; font-size: 11px; font-weight: 500; letter-spacing: 1.2px;
            text-transform: uppercase; color: var(--rose); margin-bottom: 16px;
            background: var(--white); padding: 5px 14px; border-radius: 20px;
            border: 1px solid var(--card-border);
        }
        .hero h1 { font-family: 'Playfair Display', serif; font-size: 44px; line-height: 1.15; margin-bottom: 16px; }
        .hero h1 em { font-style: italic; color: var(--rose); }
        .hero p { font-size: 15px; color: var(--muted); max-width: 460px; margin: 0 auto; line-height: 1.8; }

        /* Stats bar */
        .stats-bar {
            display: flex; justify-content: center; gap: 60px;
            padding: 32px 40px; background: var(--white);
            border-bottom: 1px solid var(--card-border); flex-wrap: wrap;
        }
        .stat { text-align: center; }
        .stat-num { font-family: 'Playfair Display', serif; font-size: 32px; color: var(--rose); display: block; }
        .stat-label { font-size: 12px; color: var(--muted); text-transform: uppercase; letter-spacing: 0.8px; }

        /* Content */
        .container { max-width: 900px; margin: 0 auto; padding: 60px 24px; }
        .section-label {
            font-size: 11px; font-weight: 500; text-transform: uppercase;
            letter-spacing: 0.9px; color: var(--rose); margin-bottom: 12px;
            display: flex; align-items: center; gap: 8px;
        }
        .section-label::before { content: ''; display: block; width: 16px; height: 2px; background: var(--rose); }
        .section-title {
            font-family: 'Playfair Display', serif; font-size: 28px;
            color: var(--ink); margin-bottom: 32px;
        }
        .section-title em { font-style: italic; color: var(--rose); }

        /* Featured story */
        .featured {
            background: var(--white); border: 1px solid var(--card-border);
            border-radius: 20px; overflow: hidden; margin-bottom: 28px;
            display: grid; grid-template-columns: 1fr 1fr;
        }
        .featured-visual {
            background: linear-gradient(135deg, #880e4f, #6a1b9a);
            padding: 48px 40px; display: flex; flex-direction: column; justify-content: center;
        }
        .featured-visual .big-quote {
            font-family: 'Playfair Display', serif; font-size: 56px; color: rgba(255,255,255,0.3); line-height: 1;
        }
        .featured-visual blockquote {
            font-family: 'Playfair Display', serif; font-style: italic;
            font-size: 18px; color: #fff; line-height: 1.6; margin-top: 8px;
        }
        .featured-visual .attrib { font-size: 12px; color: rgba(255,255,255,0.6); margin-top: 14px; }
        .featured-body { padding: 40px; }
        .win-badge {
            display: inline-block; background: #e8f5e9; color: #2e7d32;
            font-size: 10px; font-weight: 500; padding: 4px 12px;
            border-radius: 20px; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 16px;
        }
        .featured-body h3 { font-family: 'Playfair Display', serif; font-size: 22px; margin-bottom: 12px; }
        .featured-body p { font-size: 13px; color: var(--muted); line-height: 1.8; margin-bottom: 16px; }
        .impact-pills { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 16px; }
        .pill {
            background: var(--rose-light); color: var(--rose); font-size: 11px;
            padding: 4px 12px; border-radius: 20px; font-weight: 500;
        }

        /* Story grid */
        .story-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 8px; }
        .story-card {
            background: var(--white); border: 1px solid var(--card-border);
            border-radius: 18px; padding: 28px;
            transition: transform 0.25s, box-shadow 0.25s;
        }
        .story-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(194,24,91,0.09); }
        .story-icon { font-size: 24px; margin-bottom: 14px; }
        .story-cat {
            font-size: 10px; font-weight: 500; padding: 3px 10px; border-radius: 20px;
            text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 12px; display: inline-block;
        }
        .cat-edu { background: #e3f2fd; color: #0d47a1; }
        .cat-health { background: #fff3e0; color: #e65100; }
        .cat-biz { background: #e8f5e9; color: #2e7d32; }
        .cat-adv { background: #f3e5f5; color: #6a1b9a; }
        .story-card h4 { font-family: 'Playfair Display', serif; font-size: 17px; margin-bottom: 8px; }
        .story-card p { font-size: 13px; color: var(--muted); line-height: 1.7; }
        .story-footer {
            display: flex; justify-content: space-between; align-items: center;
            margin-top: 18px; padding-top: 14px; border-top: 1px solid var(--card-border);
            font-size: 12px; color: var(--muted);
        }
        .result-tag { color: #2e7d32; font-weight: 500; }

        @media (max-width: 680px) {
            .featured { grid-template-columns: 1fr; }
            .story-grid { grid-template-columns: 1fr; }
            .hero h1 { font-size: 28px; }
            .stats-bar { gap: 32px; }
            .header { padding: 0 20px; }
        }
    </style>
</head>
<body>

<header class="header">
    <a href="index.php" class="logo">Empower<span>Her</span></a>
    <nav class="nav-links">
        <a href="index.php">Campaigns</a>
        <a href="about.php">About</a>
        <a href="stories.php" class="active">Stories</a>
        <a href="connect.php">Connect</a>
    </nav>
</header>

<section class="hero">
    <div class="hero-tag">Impact Stories</div>
    <h1>Real women. <em>Real wins.</em></h1>
    <p>Every campaign here started with one woman who refused to be silent. Here are the ones that changed something.</p>
</section>

<div class="stats-bar">
    <div class="stat"><span class="stat-num">9+</span><span class="stat-label">Campaigns Won</span></div>
    <div class="stat"><span class="stat-num">25K+</span><span class="stat-label">People Impacted</span></div>
    <div class="stat"><span class="stat-num">18</span><span class="stat-label">Cities Reached</span></div>
    <div class="stat"><span class="stat-num">150+</span><span class="stat-label">Active Supporters</span></div>
</div>

<div class="container">

    <!-- Featured -->
    <p class="section-label">Featured story</p>
    <p class="section-title">The campaign that <em>started it all</em></p>

    <div class="featured">
        <div class="featured-visual">
            <div class="big-quote">"</div>
            <blockquote>I didn't just want a seat at the table — I wanted to build a bigger table.</blockquote>
            <p class="attrib">— Riya Sharma, Founder · Safe Commute Coalition</p>
        </div>
        <div class="featured-body">
            <span class="win-badge">✓ Campaign Won</span>
            <h3>Safe Commute Coalition</h3>
            <p>Riya's petition demanding mandatory CCTV and panic buttons on public buses gathered 25,000 signatures in 11 days. Six months later, the city transport authority mandated safety upgrades across all routes.</p>
            <p>What started as a late-night tweet after a frightening commute became policy that now protects thousands of women every day.</p>
            <div class="impact-pills">
                <span class="pill">25,000 signatures</span>
                <span class="pill">Policy enacted</span>
                <span class="pill">3 cities adopted</span>
            </div>
        </div>
    </div>

    <!-- More stories -->
    <p class="section-label" style="margin-top: 52px;">More victories</p>
    <p class="section-title">Every win <em>matters</em></p>

    <div class="story-grid">
        <div class="story-card">
            <div class="story-icon">📚</div>
            <span class="story-cat cat-edu">Education</span>
            <h4>Code & Conquer</h4>
            <p>A digital literacy drive reached 500 girls in three rural districts, partnering with local schools to run after-hours coding clubs. 42 girls went on to win state-level tech competitions.</p>
            <div class="story-footer">
                <span>Mar 2025</span>
                <span class="result-tag">500 girls reached</span>
            </div>
        </div>

        <div class="story-card">
            <div class="story-icon">🧠</div>
            <span class="story-cat cat-health">Health</span>
            <h4>Mind Matters</h4>
            <p>Free maternal mental health circles launched in 6 hospitals. Over 300 new mothers attended in the first 3 months, with 89% reporting reduced anxiety and stronger support networks.</p>
            <div class="story-footer">
                <span>Jan 2025</span>
                <span class="result-tag">300+ mothers supported</span>
            </div>
        </div>

        <div class="story-card">
            <div class="story-icon">💼</div>
            <span class="story-cat cat-biz">Business</span>
            <h4>Equal Pay Audit</h4>
            <p>Partnered with 40 companies to run anonymous salary audits. 12 firms restructured pay bands as a direct result, closing gender wage gaps averaging 18% across tech and finance roles.</p>
            <div class="story-footer">
                <span>Nov 2024</span>
                <span class="result-tag">12 companies changed</span>
            </div>
        </div>

        <div class="story-card">
            <div class="story-icon">🎓</div>
            <span class="story-cat cat-edu">Education</span>
            <h4>STEM Scholarship Drive</h4>
            <p>Crowdfunded full university scholarships for 100 girls from low-income families. All 100 enrolled in STEM programmes — the first in their families to attend university.</p>
            <div class="story-footer">
                <span>Aug 2024</span>
                <span class="result-tag">100 scholarships funded</span>
            </div>
        </div>
    </div>

</div>

</body>
</html>