<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us</title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary: #4f46e5;         
      --secondary: #06b6d4;       
      --highlight-bg: #e0f2fe;    
      --quote-bg: #dbeafe;        
      --bg-gradient: linear-gradient(to right, #dbeafe, #e0f2fe);
      --glass: rgba(255, 255, 255, 0.7);
      --blur: blur(12px);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Outfit', sans-serif;
      background: var(--bg-gradient);
      min-height: 100vh;
      padding: 60px 20px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      color: #333;
    }

    .container {
      width: 100%;
      max-width: 1000px;
      background: var(--glass);
      backdrop-filter: var(--blur);
      border-radius: 18px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .hero {
      background: linear-gradient(to right, #4f46e5, #06b6d4);
      color: white;
      padding: 60px 40px;
      text-align: center;
    }

    .hero h1 {
      font-size: 42px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 18px;
      opacity: 0.95;
    }

    .section {
      padding: 40px 50px;
      background-color: white;
      border-bottom: 1px solid #e5e7eb;
    }

    .section h2 {
      font-size: 24px;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .section p {
      font-size: 16px;
      line-height: 1.7;
      color: #444;
    }

    .quote-box {
      background: var(--quote-bg);
      color: #1e3a8a;
      padding: 30px;
      font-size: 18px;
      font-style: italic;
      border-radius: 12px;
      margin: 40px 50px;
      position: relative;
      box-shadow: 0 10px 30px rgba(79, 70, 229, 0.1);
    }

    .quote-box::before {
      content: "❝";
      font-size: 50px;
      position: absolute;
      top: -25px;
      left: 20px;
      opacity: 0.2;
    }

    .quote-author {
      text-align: right;
      margin-top: 15px;
      font-weight: 600;
      font-size: 14px;
      opacity: 0.8;
    }

    footer {
      background-color: #f1f5f9;
      padding: 30px;
      text-align: center;
      font-size: 14px;
      color: #666;
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 32px;
      }

      .section {
        padding: 30px 20px;
      }

      .quote-box {
        margin: 30px 20px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="hero">
    <h1>About Us</h1>
    <p>Delivering speed, security, and reliability — across every mile, every time.</p>
  </div>

  <div class="section">
    <h2>Who We Are</h2>
    <p>
      At SkyFast Couriers, we're more than just a delivery company. We're a team of logistics professionals committed to connecting people and businesses through fast, secure, and dependable courier services — locally and internationally.
    </p>
  </div>

  <div class="section">
    <h2>What We Deliver</h2>
    <p>
      From documents and eCommerce packages to critical same-day shipments, we handle it all with precision. We provide doorstep pickups, real-time tracking, insured shipping, and 24/7 customer support to ensure your parcels are always in safe hands.
    </p>
  </div>

  <div class="section">
    <h2>Why Choose Us</h2>
    <p>
      We blend advanced technology with a personal touch. With a 98% on-time delivery rate and a network spanning over 1,000 destinations, we are trusted by thousands of individuals and businesses every single day.
    </p>
  </div>

  <div class="quote-box">
    “Speed is our promise. Safety is our priority. Satisfaction is our goal.”
    <div class="quote-author">— SkyFast Couriers</div>
  </div>

  <footer>
    &copy; {{ date('Y') }} SkyFast Couriers • All rights reserved
  </footer>
</div>

</body>
</html>
