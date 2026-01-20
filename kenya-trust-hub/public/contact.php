<?php include '../app/views/partials/header.php'; ?>

<section class="py-16 bg-gray-50">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Contact Us</h1>

    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Get In Touch</h2>
        <div class="space-y-4">
          <div>
            <h3 class="font-semibold text-lg">Email</h3>
            <p class="text-gray-600">support@trusthub.ke</p>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Phone</h3>
            <p class="text-gray-600">+254 700 123 456</p>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Address</h3>
            <p class="text-gray-600">Nairobi, Kenya</p>
          </div>
        </div>
      </div>

      <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4 text-green-600">Send us a Message</h2>
        <form method="post" class="space-y-4">
          <div>
            <label class="block text-gray-700 mb-2">Name</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-gray-700 mb-2">Subject</label>
            <input type="text" name="subject" class="w-full px-4 py-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-gray-700 mb-2">Message</label>
            <textarea name="message" rows="4" class="w-full px-4 py-2 border rounded-lg" required></textarea>
          </div>
          <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include '../app/views/partials/footer.php'; ?>