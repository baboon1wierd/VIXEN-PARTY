<?php include '../app/views/partials/header.php'; ?>

  <!-- Hero -->
  <section class="max-w-6xl mx-auto px-6 py-20 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-6">
      Lost something? Got scammed?<br/>Kenya, report it here.
    </h1>
    <p class="text-lg text-gray-600 mb-8">
      A community-powered platform for lost & found, scam alerts, and consumer protection.
    </p>
    <div class="flex justify-center gap-4">
      <button class="bg-black text-white px-6 py-3 rounded-xl">Search Listings</button>
      <button class="border border-black px-6 py-3 rounded-xl">Report Incident</button>
    </div>
  </section>

  <!-- Stats -->
  <section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
      <div class="grid md:grid-cols-4 gap-8 text-center">
        <div class="p-6 bg-gradient-to-r from-red-100 to-pink-100 rounded-2xl">
          <h3 class="text-3xl font-bold text-red-600">5,000+</h3>
          <p class="text-gray-700">Items Recovered</p>
        </div>
        <div class="p-6 bg-gradient-to-r from-blue-100 to-cyan-100 rounded-2xl">
          <h3 class="text-3xl font-bold text-blue-600">2,500+</h3>
          <p class="text-gray-700">Scams Exposed</p>
        </div>
        <div class="p-6 bg-gradient-to-r from-green-100 to-teal-100 rounded-2xl">
          <h3 class="text-3xl font-bold text-green-600">8,000+</h3>
          <p class="text-gray-700">Active Users</p>
        </div>
        <div class="p-6 bg-gradient-to-r from-purple-100 to-indigo-100 rounded-2xl">
          <h3 class="text-3xl font-bold text-purple-600">24/7</h3>
          <p class="text-gray-700">Community Support</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section class="py-16 bg-gradient-to-r from-yellow-50 to-orange-50">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Why Choose Kenya Trust Hub?</h2>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-3xl shadow-xl feature-card border-l-4 border-red-500">
          <h3 class="font-bold text-2xl mb-4 text-red-600">🧾 Lost & Found</h3>
          <p class="text-gray-600 text-lg">
            Report or recover lost phones, IDs, wallets, livestock, and documents. Real-time updates from the community!
          </p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-xl feature-card border-l-4 border-blue-500">
          <h3 class="font-bold text-2xl mb-4 text-blue-600">🚨 Scam Alerts</h3>
          <p class="text-gray-600 text-lg">
            Expose fake shops, job scams, landlords, and online fraud. Protect your fellow Kenyans from falling victim.
          </p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-xl feature-card border-l-4 border-green-500">
          <h3 class="font-bold text-2xl mb-4 text-green-600">🛒 Consumer Protection</h3>
          <p class="text-gray-600 text-lg">
            Flag counterfeit, overpriced, or low-quality products. Shop smart with community reviews and alerts.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-16 bg-gradient-to-r from-indigo-100 to-purple-100">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">What Our Community Says</h2>
      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-2xl shadow-lg">
          <p class="text-gray-600 mb-4">"Recovered my lost phone thanks to this platform! The community is amazing."</p>
          <p class="font-semibold text-purple-600">- Sarah M., Nairobi</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-lg">
          <p class="text-gray-600 mb-4">"Avoided a major scam because of the alerts here. Highly recommend!"</p>
          <p class="font-semibold text-purple-600">- John K., Mombasa</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="bg-gradient-to-r from-red-600 to-pink-600 text-white py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold mb-4">Weekly Fraud & Safety Alerts</h2>
      <p class="text-xl text-white mb-8 opacity-90">
        Get trending scams, unsafe products, and recovery stories — straight to your inbox. Stay ahead of the game!
      </p>
      <div class="flex justify-center gap-4 flex-wrap">
        <input type="email" placeholder="Enter your email"
          class="px-6 py-4 rounded-full text-black w-80 text-lg"/>
        <button class="bg-yellow-400 text-black px-8 py-4 rounded-full font-bold text-lg hover:bg-yellow-300 shadow-lg">
          Subscribe Now
        </button>
      </div>
    </div>
  </section>

<?php include '../app/views/partials/footer.php'; ?>