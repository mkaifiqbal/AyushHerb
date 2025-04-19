<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AYUSH Herb Quiz</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    function showCategory(category) {
      document.querySelectorAll(".quiz-section").forEach(s => s.classList.add("hidden"));
      document.getElementById(category).classList.remove("hidden");
    }

    function submitQuiz(formId, answers) {
      let form = document.getElementById(formId);
      let inputs = form.querySelectorAll("input[type=radio]:checked");
      let score = 0;

      inputs.forEach((input, index) => {
        if (input.value === answers[index]) {
          score++;
        }
      });

      document.getElementById("result").innerHTML =
        `<div class="mt-6 p-4 rounded-lg bg-green-100 border border-green-400 text-green-800 text-center font-semibold">
          You scored ${score} out of ${answers.length}!
        </div>`;
    }

    function resetQuiz() {
      location.reload();
    }
  </script>
</head>
<body class="bg-green-50 text-green-900 min-h-screen px-4 py-10">
  <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg border-2 border-green-300 p-8">
    <a href="../index.html" class="text-green-700"><i class="fa-solid fa-house"></i></a>
    <h1 class="text-3xl font-bold text-center text-green-700 mb-6">🌿 AYUSH Herb Quiz</h1>

    <!-- Category Selection -->
    <div class="text-center mb-6">
      <p class="mb-2 font-semibold">Choose a category:</p>
      <div class="flex flex-wrap justify-center gap-4">
        <button onclick="showCategory('immunity')" type="button" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Immunity</button>
        <button onclick="showCategory('digestion')" type="button" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Digestion</button>
        <button onclick="showCategory('common')" type="button" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Common Herbs</button>
      </div>
    </div>

    <!-- Immunity Quiz -->
    <form id="immunity" class="quiz-section hidden space-y-6">
      <h2 class="text-xl font-semibold text-green-700">🌿 Immunity Quiz</h2>

      <?php
      $questions = [
        "Which herb is known for strong immunity benefits?" => ["Tulsi", "Mint", "Coriander", "Rosemary", "Tulsi"],
        "What vitamin in Amla boosts immunity?" => ["Vitamin A", "Vitamin C", "Vitamin D", "Vitamin K", "Vitamin C"],
        "Which herb is known as Indian ginseng?" => ["Brahmi", "Giloy", "Ashwagandha", "Neem", "Ashwagandha"],
        "Giloy is mainly used for?" => ["Weight loss", "Hair growth", "Boosting immunity", "Diabetes", "Boosting immunity"],
        "Which part of Neem is used to strengthen immunity?" => ["Fruit", "Leaves", "Root", "Flower", "Leaves"]
      ];

      $correct = [];

      $qNo = 1;
      foreach ($questions as $q => $opts) {
        echo "<div><p class='font-medium'>$qNo. $q</p>";
        foreach (array_slice($opts, 0, 4) as $i => $opt) {
          echo "<label class='block ml-4'><input type='radio' name='q$qNo' value='$opt'> $opt</label>";
        }
        echo "</div>";
        array_push($correct, end($opts));
        $qNo++;
      }
      ?>
      <div class="mt-4">
        <button type="button" onclick='submitQuiz("immunity", <?php echo json_encode($correct); ?>)' class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Submit</button>
        <button type="button" onclick="resetQuiz()" class="ml-4 border border-green-600 text-green-600 px-6 py-2 rounded-lg hover:bg-green-100">Retry</button>
      </div>
    </form>

    <!-- Digestion Quiz -->
    <form id="digestion" class="quiz-section hidden space-y-6">
      <h2 class="text-xl font-semibold text-green-700">🍃 Digestion Quiz</h2>

      <?php
      $questions = [
        "Which herb is good for digestive health?" => ["Ginger", "Neem", "Ashwagandha", "Basil", "Ginger"],
        "Which spice helps reduce acidity?" => ["Fennel", "Turmeric", "Clove", "Cumin", "Fennel"],
        "Ajwain is used for?" => ["Flavour", "Indigestion", "Hair fall", "Cough", "Indigestion"],
        "Triphala consists of?" => ["Tulsi, Amla, Neem", "Amla, Haritaki, Bibhitaki", "Ashwagandha, Neem, Brahmi", "Fennel, Ginger, Mint", "Amla, Haritaki, Bibhitaki"],
        "Which herb relieves bloating?" => ["Cardamom", "Cumin", "Amla", "Tulsi", "Cumin"]
      ];

      $correct = [];

      $qNo = 1;
      foreach ($questions as $q => $opts) {
        echo "<div><p class='font-medium'>$qNo. $q</p>";
        foreach (array_slice($opts, 0, 4) as $opt) {
          echo "<label class='block ml-4'><input type='radio' name='d$qNo' value='$opt'> $opt</label>";
        }
        echo "</div>";
        array_push($correct, end($opts));
        $qNo++;
      }
      ?>
      <div class="mt-4">
        <button type="button" onclick='submitQuiz("digestion", <?php echo json_encode($correct); ?>)' class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Submit</button>
        <button type="button" onclick="resetQuiz()" class="ml-4 border border-green-600 text-green-600 px-6 py-2 rounded-lg hover:bg-green-100">Retry</button>
      </div>
    </form>

    <!-- Common Herbs Quiz -->
    <form id="common" class="quiz-section hidden space-y-6">
      <h2 class="text-xl font-semibold text-green-700">🌱 Common Herbs Quiz</h2>

      <?php
      $questions = [
        "What is Tulsi commonly called?" => ["Holy Basil", "Coriander", "Indian Thyme", "Lemon Grass", "Holy Basil"],
        "Which herb is used both as medicine and spice?" => ["Mint", "Aloe Vera", "Turmeric", "Neem", "Turmeric"],
        "Which plant is known for aloe gel?" => ["Giloy", "Aloe Vera", "Brahmi", "Ashwagandha", "Aloe Vera"],
        "What is the Hindi name for 'Basil'?" => ["Tulsi", "Ajwain", "Jeera", "Haldi", "Tulsi"],
        "Which herb is known to purify blood?" => ["Neem", "Ginger", "Fennel", "Peppermint", "Neem"]
      ];

      $correct = [];

      $qNo = 1;
      foreach ($questions as $q => $opts) {
        echo "<div><p class='font-medium'>$qNo. $q</p>";
        foreach (array_slice($opts, 0, 4) as $opt) {
          echo "<label class='block ml-4'><input type='radio' name='c$qNo' value='$opt'> $opt</label>";
        }
        echo "</div>";
        array_push($correct, end($opts));
        $qNo++;
      }
      ?>
      <div class="mt-4">
        <button type="button" onclick='submitQuiz("common", <?php echo json_encode($correct); ?>)' class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Submit</button>
        <button type="button" onclick="resetQuiz()" class="ml-4 border border-green-600 text-green-600 px-6 py-2 rounded-lg hover:bg-green-100">Retry</button>
      </div>
    </form>

    <!-- Result Box -->
    <div id="result"></div>
  </div>
</body>
</html>

