<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer | Campaign Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --accent: #ff4081;
            --glass: rgba(255, 255, 255, 0.9);
            --grad: linear-gradient(135deg, #fce4ec 0%, #f3e5f5 100%);
        }

        body {
            background: var(--grad);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            margin: 0; padding: 20px;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            background: var(--glass);
            backdrop-filter: blur(15px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            border: 1px solid rgba(255,255,255,0.4);
        }

        h2 {
            font-size: 2.2rem;
            background: linear-gradient(to right, #d81b60, #8e24aa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-bottom: 10px;
        }

        .stats-row { display: flex; justify-content: space-around; margin: 30px 0; text-align: center; }
        .stats-row h3 { font-size: 1.8rem; margin: 0; }

        .form-group { margin-bottom: 20px; }
        label { font-weight: 600; font-size: 0.9rem; color: #666; display: block; margin-bottom: 8px; }

        input, select, textarea {
            width: 100%; padding: 12px; border: 1px solid #eee; border-radius: 12px;
            background: white; transition: 0.3s; box-sizing: border-box;
        }

        input:focus { border-color: var(--accent); outline: none; transform: translateY(-2px); }

        button {
            background: linear-gradient(to right, #ff4081, #d81b60);
            color: white; border: none; padding: 14px; border-radius: 12px;
            font-weight: 600; cursor: pointer; width: 100%; transition: 0.3s;
        }

        button:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(216, 27, 96, 0.2); }

        /* Campaign Cards */
        .card {
            background: white; border-radius: 18px; padding: 25px; margin-top: 25px;
            transition: 0.5s ease; border: 1px solid #f0f0f0;
            opacity: 0; transform: translateY(30px); /* Animation Start */
        }
        .reveal { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body>

<div class="container">
    <h2>EmpowerHer</h2>
    <p style="text-align: center; color: #777;">Platform for Women-led Initiatives</p>

    <div class="stats-row">
        <div><h3 id="count-campaigns" style="color: #d81b60;">0</h3><p>Campaigns</p></div>
        <div><h3 id="count-members" style="color: #8e24aa;">0</h3><p>Supporters</p></div>
    </div>

    <form action="process.php" method="POST">
        <div class="form-group">
            <label>Campaign Title</label>
            <input type="text" name="title" required placeholder="Name your cause...">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category">
                <option value="Business">Business & Tech</option>
                <option value="Health">Health & Wellness</option>
                <option value="Education">Education</option>
                <option value="Advocacy">Social Advocacy</option>
            </select>
        </div>
        <div class="form-group">
            <label>Detailed Description</label>
            <textarea name="description" rows="4" required placeholder="Tell your story..."></textarea>
        </div>
        <button type="submit" name="submit">Launch Initiative</button>
    </form>

    <div id="campaign-list" style="margin-top: 50px;">
        <h3 style="border-bottom: 2px solid #fce4ec; padding-bottom: 10px;">Ongoing Campaigns</h3>
        <?php include 'fetch.php'; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Number counting animation
        const animate = (id, end) => {
            let start = 0;
            let duration = 2000;
            let range = end - start;
            let step = Math.abs(Math.floor(duration / range));
            let obj = document.getElementById(id);
            let timer = setInterval(() => {
                start++;
                obj.innerText = start + "+";
                if (start == end) clearInterval(timer);
            }, step);
        };
        animate("count-campaigns", 42); // Example static numbers
        animate("count-members", 150);

        // Scroll Reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('reveal');
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.card').forEach(card => observer.observe(card));
    });
</script>
</body>
</html>