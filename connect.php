<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer | Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --rose: #c2185b; --rose-light: #fce4ec; --plum: #6a1b9a;
            --ink: #1a0a0f; --muted: #7a5a66; --surface: #fff8f9;
            --white: #ffffff; --card-border: #f3c4d4;
        }
        body { background: var(--surface); font-family: 'DM Sans', sans-serif; color: var(--ink); min-height: 100vh; }

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
        .hero p { font-size: 15px; color: var(--muted); max-width: 440px; margin: 0 auto; line-height: 1.8; }

        /* Container */
        .container { max-width: 860px; margin: 0 auto; padding: 64px 24px; }
        .section-label {
            font-size: 11px; font-weight: 500; text-transform: uppercase;
            letter-spacing: 0.9px; color: var(--rose); margin-bottom: 12px;
            display: flex; align-items: center; gap: 8px;
        }
        .section-label::before { content: ''; display: block; width: 16px; height: 2px; background: var(--rose); }
        .section-title { font-family: 'Playfair Display', serif; font-size: 28px; color: var(--ink); margin-bottom: 32px; }
        .section-title em { font-style: italic; color: var(--rose); }

        /* Social grid */
        .social-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; }

        .social-card {
            background: var(--white); border: 1px solid var(--card-border);
            border-radius: 20px; padding: 32px 28px;
            display: flex; flex-direction: column;
            transition: transform 0.25s, box-shadow 0.25s;
            text-decoration: none; color: inherit;
            position: relative; overflow: hidden;
        }
        .social-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0;
            height: 4px; background: var(--accent-color);
        }
        .social-card:hover { transform: translateY(-5px); box-shadow: 0 16px 40px rgba(194,24,91,0.12); }

        .social-card.instagram  { --accent-color: linear-gradient(90deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
        .social-card.twitter    { --accent-color: #1da1f2; }
        .social-card.linkedin   { --accent-color: #0077b5; }
        .social-card.youtube    { --accent-color: #ff0000; }
        .social-card.whatsapp   { --accent-color: #25d366; }
        .social-card.facebook   { --accent-color: #1877f2; }

        .social-logo {
            width: 48px; height: 48px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; margin-bottom: 18px;
        }
        .social-logo.instagram  { background: linear-gradient(135deg, #f09433, #dc2743, #bc1888); }
        .social-logo.twitter    { background: #1da1f2; }
        .social-logo.linkedin   { background: #0077b5; }
        .social-logo.youtube    { background: #ff0000; }
        .social-logo.whatsapp   { background: #25d366; }
        .social-logo.facebook   { background: #1877f2; }

        .social-card h3 { font-size: 16px; font-weight: 500; margin-bottom: 6px; }
        .social-card .handle { font-size: 13px; color: var(--rose); margin-bottom: 10px; font-weight: 500; }
        .social-card p { font-size: 13px; color: var(--muted); line-height: 1.6; flex: 1; }
        .social-card .followers { font-size: 11px; color: var(--muted); margin-top: 18px; padding-top: 14px; border-top: 1px solid var(--card-border); display: flex; justify-content: space-between; }
        .social-card .followers strong { color: var(--ink); }
        .follow-btn {
            margin-top: 18px; padding: 9px 20px; border-radius: 10px;
            font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500;
            border: 1px solid var(--card-border); background: var(--surface);
            color: var(--ink); cursor: pointer; transition: all 0.2s; text-align: center;
        }
        .social-card:hover .follow-btn { background: var(--rose-light); border-color: var(--rose); color: var(--rose); }

        /* Community CTA */
        .cta {
            margin-top: 52px; background: linear-gradient(135deg, #880e4f, #6a1b9a);
            border-radius: 20px; padding: 52px 48px;
            display: flex; align-items: center; justify-content: space-between; gap: 32px;
            flex-wrap: wrap;
        }
        .cta h2 { font-family: 'Playfair Display', serif; font-size: 28px; color: #fff; max-width: 380px; line-height: 1.25; }
        .cta h2 em { font-style: italic; color: #f48fb1; }
        .cta p { font-size: 13px; color: rgba(255,255,255,0.7); max-width: 340px; line-height: 1.7; margin-top: 10px; }
        .cta-btn {
            padding: 14px 32px; background: #fff; color: var(--rose);
            border: none; border-radius: 12px; font-family: 'DM Sans', sans-serif;
            font-size: 14px; font-weight: 500; cursor: pointer;
            text-decoration: none; display: inline-block;
            transition: transform 0.2s, box-shadow 0.2s; white-space: nowrap;
        }
        .cta-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.2); }

        @media (max-width: 640px) {
            .hero h1 { font-size: 28px; }
            .cta { padding: 36px 28px; }
            .cta h2 { font-size: 22px; }
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
        <a href="stories.php">Stories</a>
        <a href="connect.php" class="active">Connect</a>
    </nav>
</header>

<section class="hero">
    <div class="hero-tag">Find Us Online</div>
    <h1>Join our <em>community</em></h1>
    <p>Follow along, share campaigns, and be part of the movement — wherever you spend your time online.</p>
</section>

<div class="container">

    <p class="section-label">Our platforms</p>
    <p class="section-title">Find us <em>everywhere</em></p>

    <div class="social-grid">

        <a class="social-card instagram" href="https://instagram.com/empowerher" target="_blank" rel="noopener">
            <div class="social-logo instagram">📸</div>
            <h3>Instagram</h3>
            <div class="handle">@empowerher</div>
            <p>Campaign spotlights, behind-the-scenes moments, and stories from our community.</p>
            <div class="followers"><span>Followers <strong>12.4K</strong></span><span>Posts <strong>340</strong></span></div>
            <div class="follow-btn">Follow on Instagram →</div>
        </a>

        <a class="social-card twitter" href="https://twitter.com/empowerher" target="_blank" rel="noopener">
            <div class="social-logo twitter">𝕏</div>
            <h3>Twitter / X</h3>
            <div class="handle">@empowerher</div>
            <p>Live campaign updates, advocacy threads, and conversations that matter.</p>
            <div class="followers"><span>Followers <strong>8.1K</strong></span><span>Posts <strong>2.1K</strong></span></div>
            <div class="follow-btn">Follow on X →</div>
        </a>

        <a class="social-card linkedin" href="https://linkedin.com/company/empowerher" target="_blank" rel="noopener">
            <div class="social-logo linkedin">in</div>
            <h3>LinkedIn</h3>
            <div class="handle">EmpowerHer</div>
            <p>Partnerships, professional milestones, and women in leadership features.</p>
            <div class="followers"><span>Followers <strong>5.3K</strong></span><span>Posts <strong>180</strong></span></div>
            <div class="follow-btn">Follow on LinkedIn →</div>
        </a>

        <a class="social-card youtube" href="https://youtube.com/@empowerher" target="_blank" rel="noopener">
            <div class="social-logo youtube">▶</div>
            <h3>YouTube</h3>
            <div class="handle">@empowerher</div>
            <p>Campaign documentary shorts, founder interviews, and event recordings.</p>
            <div class="followers"><span>Subscribers <strong>3.8K</strong></span><span>Videos <strong>52</strong></span></div>
            <div class="follow-btn">Subscribe →</div>
        </a>

        <a class="social-card whatsapp" href="https://wa.me/910000000000" target="_blank" rel="noopener">
            <div class="social-logo whatsapp">💬</div>
            <h3>WhatsApp Community</h3>
            <div class="handle">EmpowerHer Circle</div>
            <p>Join our private community group for campaign updates, support, and local meetups.</p>
            <div class="followers"><span>Members <strong>1.2K</strong></span><span>Active daily</span></div>
            <div class="follow-btn">Join the Community →</div>
        </a>

        <a class="social-card facebook" href="https://facebook.com/empowerher" target="_blank" rel="noopener">
            <div class="social-logo facebook">f</div>
            <h3>Facebook</h3>
            <div class="handle">EmpowerHer</div>
            <p>Campaign events, local chapter updates, and community discussions across India.</p>
            <div class="followers"><span>Likes <strong>9.7K</strong></span><span>Active group</span></div>
            <div class="follow-btn">Follow on Facebook →</div>
        </a>

    </div>

    <!-- Community CTA -->
    <div class="cta">
        <div>
            <h2>Ready to <em>launch</em> your campaign?</h2>
            <p>Join thousands of women already making waves. Your movement starts with a single step.</p>
        </div>
        <a href="index.php" class="cta-btn">Start a Campaign →</a>
    </div>

</div>

</body>
</html>