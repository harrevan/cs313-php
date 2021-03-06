
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Include Bootstrap compiled CSS. Most of the CSS in this page consists of built-in Bootstrap classes. -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="homestyles.css">
    
    <!--Include Bootstrap compiled JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script> 
  </head>
  <body class="outer-bod">
    <div class="jumbotron text-center">
      <div class="container">
        <h1>Evan Harrison's Home Page</h1>
        <p>Meet the most precious thing in the world to me... my family.</p>
         
         <!-- PHP used to display current date-->
        <?php echo "Date: " . date("m-d-Y")?>
      </div>
    </div>
    <a href="assignments.html" id="assignments-link">Assignments Page</a>


    <div class="container text-white inner-bod">
      <!--1st row -->
      <div class="row">
        <div class="col-sm-4">
          <h2>Evan Harrison<h2>
          <img class="img-thumbnail img-fluid" src="evan.jpg" alt="Evan">
        </div>
        <div class="col-sm-4">
          <h2>Finn Harrison</h2>
          <img class="img-thumbnail img-fluid" src="finn.jpg" alt="Finn">
        </div>
        <div class="col-sm-4">
          <h2>Jennica Harrison</h2>
          <img class="img-thumbnail img-fluid" src="jenca.jpg" alt="Jennica">
        </div>
      </div>
      
      <h3 class="text-center" id="about-header">About Evan</h3>
      <button class="btn" data-toggle="collapse" data-target="#evan">See More</button>
      <div id="evan" class="collapse border border-white rounded pic-left">
        <div class="row">
          <div class="col-sm-4">
            <img src="evan2.jpg" class="rounded img-fluid float-right" alt="Evan and Jennica">
          </div> 
          <div class="col-sm-8">
            <p class="text-justify">
              I am from Pocatello, Idaho. I have been married to my highschool sweetheart for almost 5 years. My wife and I met in high school, and 
              were friends for most of those four years. During this time, I played both soccer and tennis. After graduating in 2011, I attended a
              year of college at Idaho State University, where I planned to study biology in hopes of eventually attending medical school.
            </p>  
            
            <p class="text-justify">
              After my first year of college, I received a mission call to the Mexico City, Mexico South mission. My two years in Mexico 
              were truly amazing. My faith and testimony grew immensely. I gained a great love and respect for the people I served, and 
              the people I served with.
            </p>
            <p class="text-justify">
              I returned home in October of 2014. I had kept in touch with Jennica while on my mission. I found her unmarried when I 
              got back, and so I decided to take advantage of that blessing by proposing to her myself in December of that month. We 
              were married in April of 2015 in the Rexburg, Idaho temple.
            </p>
            <p class="text-justify">
              After studying Biology and shadowing a couple of doctors, my desire to attend medical school and work in the medical
              field began to change. I decided I wanted to try something else. I ended up taking a programming class in my sixth semester
              at ISU. I found that I really enjoyed it, and wanted to learn more. I started researching programs that might be of interest
              to me, and discovered that BYU-Idaho offered a Software Engineering program. I applied to BYU-I, was accepted, and began my
              first semester in the fall of 2017. I am still going strong in this academic course, and I hope to eventually become a 
              Software Engineer, or a Software Developer in the near future.
            </p>  
            <p class="text-justify">
              I love reading, watching movies/sports, disc golfing, exercising, and spending time with my growing family.
            </p>   
          </div>
        </div>        
      </div>
      
      <h3 class="text-center">About Jennica</h3>
      <button class="btn" data-toggle="collapse" data-target="#jennica">See More</button>
      <div id="jennica" class="collapse border border-white rounded pic-right">
        <div class="row">
          <div class="col-sm-8">
            <p class="text-justify">
              Jennica is my sweet wife. I'm not trying to sound cliche, but she is the best thing that ever happened to me.
            </p>
            <p class="text-justify">
              Jennica played volleyball throughout junior high, and into high school. She also played tennis through much of high school. 
              In addition, Jennica worked throughout high school by teaching piano to kids in her ward and neighborhood. She is an 
              excellent pianist, who has often held the calling of ward organist since she was a teenager. 
            </p>
            <p class="text-justify">
              We were a part of the same friend group throughout high school, and we started dating during our senior year. Jennica attended her first year
              of college at ISU, but quickly felt prompted to attend school at BYU-Idaho. She earned her degree in early childhood special education. She
              loves working with children. Currently, she is working as a Kindergarden teacher. She is an amazing wife and mother. Her hobbies include
              playing the piano, sewing blankets, going out on dates with her husband, playing with the baby, and cooking.
            </p>
          </div>
          <div class="col-sm-4">
            <img src="jenca2.jpg" class="rounded img-fluid float-right" alt="Evan and Jennica">
          </div> 
        </div>
      </div>
       
      <h3 class="text-center">About Finn</h3>
      <button class="btn" data-toggle="collapse" data-target="#finn">See More</button>
      <div id="finn" class="collapse border border-white rounded pic-left">
        <div class="row">
          <div class="col-sm-4">
            <img src="finn2.jpg" class="rounded img-fluid float-left" alt="Finn and family">
          </div> 
          <div class="col-sm-8">
            <p class="text-justify">
              Finn is the newest addition to the Harrison Family. He is the sweetest baby boy you'll ever meet. He just turned two in December of 2019. He loves running around and getting into anything that is forbidden. He also enjoys playing with his trucks, watching Daddy fly his drone, and playing with the dog. He is a tremendous addition to our family, and a pure delight. My wife and I love him dearly.
            </p>
          </div>
        </div>
      </div>
    
      <h3 class="text-center">Honorable Mention...</h3>
      
      <button class="btn" data-toggle="collapse" data-target="#remmy">See More</button>
      <div id="remmy" class="collapse border border-white rounded pic-right">
        <div class="row">
          <div class="col-sm-8">
            <p class="text-justify">
              I suppose I would be remiss if I didn't mention Remmy, our dog. He is 4 years old, and full of energy. He loves playing
              with other dogs, getting in the way, digging, chewing his toys to shreds, playing fetch, going on walks, and being with 
              people. He also has been a good sport with the addition of the baby by playing gently (usually) with the baby, letting
              the baby tug on his tail and ears, and behaving well despite a decrease in attention towards him.
            </p>  
          </div> <!-- col--> 
          <div class="col-sm-4">
            <img src="remmy.jpg" class="rounded img-fluid float-right" alt="Remmy">
          </div> <!-- col-->  
        </div> <!-- row--> 
      </div> <!-- cont-->      
    </div> <!-- cont largest--> 
  </body>
</html>
