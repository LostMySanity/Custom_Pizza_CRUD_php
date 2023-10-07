<?php

include('config/db_connect.php');
// query for allpizza
$sql = 'SELECT title, ingredients, id FROM pizza ORDER BY created_at';

$result = mysqli_query($conn, $sql);

// fetch the reulting rows as an array
$pizza = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

explode(',',$pizza[0]['ingredients'])
?>

<!DOCTYPE html>
<html>
    
    <?php include('template/header.php'); ?>

    <h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">

        <?php foreach($pizza as $pizzas): ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                <img src="img/pizza.png"class="pizza">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizzas['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',',$pizzas['ingredients']) as $ing): ?>
                          <li><?php echo htmlspecialchars($ing) ?></li>    
                          <?php endforeach; ?>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $pizzas['id'] ?>"> more info</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        
        <?php if(count($pizza) >= 3): ?>
        <p>there are 3 or more pizzas</p>
            <?php  else : ?>
                <p>there are less than 3 pizzas</p>
          <?php endif; ?>
    </div>
</div>

    <?php include('template/footer.php'); ?>

</html>