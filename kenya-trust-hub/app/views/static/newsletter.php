<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="newsletter-container">
    <section class="hero-section">
        <h1>Stay Informed, Stay Protected</h1>
        <p>Join thousands of Kenyans who trust Kenya Trust Hub for the latest consumer protection insights, scam alerts, and market updates.</p>
    </section>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-error">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);
    }
    ?>

    <section class="subscription-section">
        <h2>Subscribe to Our Newsletter</h2>
        <p>Get personalized updates based on your interests. Choose your preferred categories below:</p>

        <form method="post" action="/newsletter.php" class="subscription-form">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" placeholder="your@email.com" required>
            </div>

            <div class="categories-section">
                <h3>Choose Your Interests (Optional)</h3>
                <div class="categories-grid">
                    <label class="category-item">
                        <input type="checkbox" name="categories[]" value="scams">
                        <span>Scam Alerts & Prevention</span>
                    </label>
                    <label class="category-item">
                        <input type="checkbox" name="categories[]" value="consumer-rights">
                        <span>Consumer Rights Updates</span>
                    </label>
                    <label class="category-item">
                        <input type="checkbox" name="categories[]" value="lost-found">
                        <span>Lost & Found Assistance</span>
                    </label>
                    <label class="category-item">
                        <input type="checkbox" name="categories[]" value="market-trends">
                        <span>Market Trends & Insights</span>
                    </label>
                    <label class="category-item">
                        <input type="checkbox" name="categories[]" value="legal-updates">
                        <span>Legal & Regulatory Updates</span>
                    </label>
                    <label class="category-item">
                        <input type="checkbox" name="categories[]" value="financial-literacy">
                        <span>Financial Literacy Tips</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="subscribe-btn">Subscribe Now</button>
        </form>
    </section>

    <section class="features-section">
        <h2>Why Subscribe?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>🛡️ Scam Protection</h3>
                <p>Be the first to know about emerging scams targeting Kenyans. Get real-time alerts and prevention tips.</p>
            </div>
            <div class="feature-card">
                <h3>📊 Market Intelligence</h3>
                <p>Stay ahead with insights on product quality, pricing trends, and consumer behavior in Kenya.</p>
            </div>
            <div class="feature-card">
                <h3>⚖️ Legal Updates</h3>
                <p>Keep up with changes in consumer protection laws, regulations, and your rights as a consumer.</p>
            </div>
            <div class="feature-card">
                <h3>💰 Financial Wisdom</h3>
                <p>Learn about safe investing, loan protection, and financial decision-making in the Kenyan context.</p>
            </div>
            <div class="feature-card">
                <h3>🔍 Recovery Support</h3>
                <p>Get guidance on recovering lost items, disputing charges, and resolving consumer disputes.</p>
            </div>
            <div class="feature-card">
                <h3>🌟 Exclusive Content</h3>
                <p>Access expert interviews, case studies, and in-depth analysis not available elsewhere.</p>
            </div>
        </div>
    </section>

    <section class="niche-updates">
        <h2>Latest Niche Updates</h2>

        <div class="update-category">
            <h3>📱 Digital Services & FinTech</h3>
            <div class="updates-list">
                <div class="update-item">
                    <h4>Mobile Money Security: Protecting Your M-Pesa Transactions</h4>
                    <p>Learn the latest security measures for mobile money transactions and how to spot fraudulent activities.</p>
                    <span class="update-date">Latest Update: January 2026</span>
                </div>
                <div class="update-item">
                    <h4>Cryptocurrency Regulations in Kenya</h4>
                    <p>Understanding the new crypto laws and how they affect your investments.</p>
                    <span class="update-date">Latest Update: December 2025</span>
                </div>
            </div>
        </div>

        <div class="update-category">
            <h3>🏠 Real Estate & Housing</h3>
            <div class="updates-list">
                <div class="update-item">
                    <h4>Apartment Rental Scams: What to Watch For</h4>
                    <p>Common rental scams in Nairobi and how to verify property listings.</p>
                    <span class="update-date">Latest Update: January 2026</span>
                </div>
                <div class="update-item">
                    <h4>Land Fraud Prevention Guide</h4>
                    <p>Protecting yourself from land grabbing and fraudulent property deals.</p>
                    <span class="update-date">Latest Update: November 2025</span>
                </div>
            </div>
        </div>

        <div class="update-category">
            <h3>🚗 Automotive & Transportation</h3>
            <div class="updates-list">
                <div class="update-item">
                    <h4>Used Car Buying Guide 2026</h4>
                    <p>Essential checks before purchasing a second-hand vehicle in Kenya.</p>
                    <span class="update-date">Latest Update: January 2026</span>
                </div>
                <div class="update-item">
                    <h4>Ride-Hailing Safety Tips</h4>
                    <p>Staying safe while using Uber, Bolt, and other ride-sharing services.</p>
                    <span class="update-date">Latest Update: December 2025</span>
                </div>
            </div>
        </div>

        <div class="update-category">
            <h3>🛒 E-Commerce & Online Shopping</h3>
            <div class="updates-list">
                <div class="update-item">
                    <h4>Jumia & Other Online Marketplaces: Buyer Protection</h4>
                    <p>How to shop safely online and what to do if you receive counterfeit goods.</p>
                    <span class="update-date">Latest Update: January 2026</span>
                </div>
                <div class="update-item">
                    <h4>Social Media Shopping Scams</h4>
                    <p>Avoiding fake sellers on Facebook Marketplace, Instagram, and WhatsApp.</p>
                    <span class="update-date">Latest Update: December 2025</span>
                </div>
            </div>
        </div>

        <div class="update-category">
            <h3>💼 Employment & Job Market</h3>
            <div class="updates-list">
                <div class="update-item">
                    <h4>Job Scam Alert: Fake Employment Agencies</h4>
                    <p>How to spot fraudulent job offers and protect your personal information.</p>
                    <span class="update-date">Latest Update: January 2026</span>
                </div>
                <div class="update-item">
                    <h4>Contractor Rights & Payment Protection</h4>
                    <p>Understanding your rights when working as a freelancer or contractor.</p>
                    <span class="update-date">Latest Update: November 2025</span>
                </div>
            </div>
        </div>

        <div class="update-category">
            <h3>🏥 Health & Wellness</h3>
            <div class="updates-list">
                <div class="update-item">
                    <h4>Fake Medications: A Growing Concern</h4>
                    <p>How to identify counterfeit drugs and report suspicious pharmacies.</p>
                    <span class="update-date">Latest Update: January 2026</span>
                </div>
                <div class="update-item">
                    <h4>Health Insurance Claims: Your Rights</h4>
                    <p>Navigating health insurance disputes and understanding coverage.</p>
                    <span class="update-date">Latest Update: December 2025</span>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <h2>What Our Subscribers Say</h2>
        <div class="testimonials-grid">
            <div class="testimonial">
                <p>"Kenya Trust Hub saved me from a major scam. Their alerts are always timely and accurate."</p>
                <cite>- Sarah M., Nairobi</cite>
            </div>
            <div class="testimonial">
                <p>"The market insights help me make better purchasing decisions. Highly recommend!"</p>
                <cite>- David K., Mombasa</cite>
            </div>
            <div class="testimonial">
                <p>"Finally, a reliable source for consumer protection information in Kenya."</p>
                <cite>- Grace W., Kisumu</cite>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h4>How often do you send newsletters?</h4>
                <p>We send weekly digests with the most important updates, plus immediate alerts for urgent issues.</p>
            </div>
            <div class="faq-item">
                <h4>Can I unsubscribe anytime?</h4>
                <p>Yes, every newsletter includes an easy unsubscribe link. We respect your preferences.</p>
            </div>
            <div class="faq-item">
                <h4>Is my email address safe?</h4>
                <p>Absolutely. We never share, sell, or misuse subscriber information. Your privacy is protected.</p>
            </div>
            <div class="faq-item">
                <h4>Do you send promotional content?</h4>
                <p>Our newsletters focus on consumer protection and education. We may occasionally share relevant partner resources.</p>
            </div>
        </div>
    </section>
</div>

<style>
.newsletter-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.hero-section {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 10px;
    margin-bottom: 40px;
}

.hero-section h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

.hero-section p {
    font-size: 1.2em;
    opacity: 0.9;
}

.subscription-section {
    background: #f8f9fa;
    padding: 40px;
    border-radius: 10px;
    margin-bottom: 40px;
}

.subscription-form {
    max-width: 600px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.categories-section h3 {
    margin-bottom: 20px;
    color: #333;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-bottom: 30px;
}

.category-item {
    display: flex;
    align-items: center;
    padding: 10px;
    background: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.category-item:hover {
    border-color: #667eea;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.category-item input[type="checkbox"] {
    margin-right: 10px;
}

.subscribe-btn {
    background: #667eea;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s ease;
}

.subscribe-btn:hover {
    background: #5a6fd8;
}

.features-section {
    margin-bottom: 40px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.feature-card {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    text-align: center;
}

.feature-card h3 {
    font-size: 1.5em;
    margin-bottom: 15px;
}

.niche-updates {
    margin-bottom: 40px;
}

.update-category {
    margin-bottom: 40px;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 10px;
}

.update-category h3 {
    color: #667eea;
    margin-bottom: 20px;
}

.updates-list {
    display: grid;
    gap: 20px;
}

.update-item {
    background: white;
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid #667eea;
}

.update-item h4 {
    margin-bottom: 10px;
    color: #333;
}

.update-date {
    color: #666;
    font-size: 0.9em;
}

.testimonials {
    background: #f8f9fa;
    padding: 40px;
    border-radius: 10px;
    margin-bottom: 40px;
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.testimonial {
    background: white;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.testimonial p {
    font-style: italic;
    margin-bottom: 15px;
}

.testimonial cite {
    color: #667eea;
    font-weight: bold;
}

.faq-section {
    margin-bottom: 40px;
}

.faq-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.faq-item {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.faq-item h4 {
    margin-bottom: 15px;
    color: #333;
}

.alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.alert-error {
    background: #fee;
    color: #c33;
    border: 1px solid #fcc;
}

.alert-success {
    background: #efe;
    color: #363;
    border: 1px solid #cfc;
}

@media (max-width: 768px) {
    .hero-section h1 {
        font-size: 2em;
    }

    .categories-grid {
        grid-template-columns: 1fr;
    }

    .features-grid,
    .testimonials-grid,
    .faq-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include __DIR__ . '/../partials/footer.php'; ?>