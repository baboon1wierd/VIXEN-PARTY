<?php include '../app/views/partials/header.php'; ?>

<div class="donations-container">
    <div class="donations-header">
        <h1>Support Kenya Trust Hub</h1>
        <p>Your donations help us maintain and improve our platform for the benefit of all users.</p>
    </div>

    <div class="donations-content">
        <div class="why-donate">
            <h2>Why Your Donation Matters</h2>
            <div class="reasons-grid">
                <div class="reason-card">
                    <div class="reason-icon">🖥️</div>
                    <h3>Platform Maintenance</h3>
                    <p>We use resources to keep our servers running smoothly and ensure 24/7 availability.</p>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">👥</div>
                    <h3>Team Support</h3>
                    <p>Our dedicated team works tirelessly to verify reports and maintain data accuracy.</p>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">🔍</div>
                    <h3>Research & Development</h3>
                    <p>We invest in research to improve consumer protection and scam detection technologies.</p>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">📚</div>
                    <h3>Education & Awareness</h3>
                    <p>Funds help us create educational content to empower users against scams and fraud.</p>
                </div>
            </div>
        </div>

        <div class="donation-form">
            <h2>Make a Donation</h2>
            <p>All donations are processed securely through M-Pesa. Choose an amount or enter your own.</p>

            <div class="amount-buttons">
                <button class="amount-btn" data-amount="50">KSh 50</button>
                <button class="amount-btn" data-amount="100">KSh 100</button>
                <button class="amount-btn" data-amount="200">KSh 200</button>
                <button class="amount-btn" data-amount="500">KSh 500</button>
                <button class="amount-btn" data-amount="1000">KSh 1000</button>
            </div>

            <div class="custom-amount">
                <label for="custom-amount-input">Or enter custom amount:</label>
                <input type="number" id="custom-amount-input" placeholder="Enter amount in KSh" min="10">
                <button id="custom-donate-btn" class="donate-btn">Donate Custom Amount</button>
            </div>

            <div id="mpesa-form" style="display: none;">
                <h3>Complete Your Donation</h3>
                <p>We'll send an M-Pesa push notification to your phone. Enter your phone number below.</p>
                <form id="mpesa-donation-form">
                    <div class="form-group">
                        <label for="phone">M-Pesa Phone Number:</label>
                        <input type="tel" id="phone" name="phone" placeholder="0712345678" required>
                    </div>
                    <div class="form-group">
                        <label for="amount-confirm">Amount: KSh <span id="amount-confirm">0</span></label>
                    </div>
                    <button type="submit" class="mpesa-submit-btn">Send M-Pesa Push</button>
                </form>
            </div>

            <div id="success-message" style="display: none;">
                <div class="success-card">
                    <h3>Thank You!</h3>
                    <p>Your donation request has been sent. Please check your phone for the M-Pesa push notification and complete the payment.</p>
                    <p>Thank you for supporting Kenya Trust Hub!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.donations-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.donations-header {
    text-align: center;
    margin-bottom: 40px;
}

.donations-header h1 {
    color: #333;
    margin-bottom: 10px;
}

.donations-header p {
    color: #666;
    font-size: 1.1em;
}

.donations-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

.why-donate h2 {
    margin-bottom: 30px;
    color: #333;
}

.reasons-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.reason-card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    text-align: center;
}

.reason-icon {
    font-size: 2em;
    margin-bottom: 15px;
}

.reason-card h3 {
    margin-bottom: 10px;
    color: #333;
}

.reason-card p {
    color: #666;
    line-height: 1.5;
}

.donation-form {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.donation-form h2 {
    margin-bottom: 10px;
    color: #333;
}

.donation-form > p {
    margin-bottom: 30px;
    color: #666;
}

.amount-buttons {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 10px;
    margin-bottom: 30px;
}

.amount-btn {
    padding: 15px;
    border: 2px solid #667eea;
    background: white;
    color: #667eea;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
}

.amount-btn:hover,
.amount-btn.selected {
    background: #667eea;
    color: white;
}

.custom-amount {
    margin-bottom: 30px;
}

.custom-amount label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
}

#custom-amount-input {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 15px;
}

.donate-btn {
    width: 100%;
    padding: 15px;
    background: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
}

.donate-btn:hover {
    background: #218838;
}

#mpesa-form {
    margin-top: 30px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
}

#mpesa-form h3 {
    margin-bottom: 10px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.mpesa-submit-btn {
    width: 100%;
    padding: 15px;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
}

.mpesa-submit-btn:hover {
    background: #5a6fd8;
}

.success-card {
    text-align: center;
    padding: 30px;
    background: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 8px;
    color: #155724;
}

.success-card h3 {
    margin-bottom: 15px;
}

@media (max-width: 768px) {
    .donations-content {
        grid-template-columns: 1fr;
    }

    .reasons-grid {
        grid-template-columns: 1fr;
    }

    .amount-buttons {
        grid-template-columns: repeat(3, 1fr);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const amountButtons = document.querySelectorAll('.amount-btn');
    const customAmountInput = document.getElementById('custom-amount-input');
    const customDonateBtn = document.getElementById('custom-donate-btn');
    const mpesaForm = document.getElementById('mpesa-form');
    const mpesaDonationForm = document.getElementById('mpesa-donation-form');
    const amountConfirm = document.getElementById('amount-confirm');
    const successMessage = document.getElementById('success-message');

    let selectedAmount = 0;

    amountButtons.forEach(button => {
        button.addEventListener('click', function() {
            amountButtons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
            selectedAmount = parseInt(this.dataset.amount);
            showMpesaForm(selectedAmount);
        });
    });

    customDonateBtn.addEventListener('click', function() {
        const customAmount = parseInt(customAmountInput.value);
        if (customAmount >= 10) {
            selectedAmount = customAmount;
            showMpesaForm(selectedAmount);
        } else {
            alert('Please enter an amount of at least KSh 10');
        }
    });

    mpesaDonationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const phone = document.getElementById('phone').value;

        // Simulate M-Pesa push (in real implementation, this would call M-Pesa API)
        alert(`M-Pesa push sent to ${phone} for KSh ${selectedAmount}. Please complete the payment on your phone.`);

        mpesaForm.style.display = 'none';
        successMessage.style.display = 'block';
    });

    function showMpesaForm(amount) {
        amountConfirm.textContent = amount;
        mpesaForm.style.display = 'block';
        successMessage.style.display = 'none';
        document.getElementById('phone').focus();
    }
});
</script>

<?php include '../app/views/partials/footer.php'; ?>