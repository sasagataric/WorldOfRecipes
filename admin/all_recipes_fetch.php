<?php
include_once '../Classes/CategoryClass.php';
include_once '../Classes/RecipeClass.php';
include_once '../Classes/AuthorClass.php';
$kategorija = new Category();
$recipe = new Recipe();
$autor = new Author();

if(isset($_POST["limit"], $_POST["start"])){


        $br=$_POST["start"] + 1;
        
        $result = $recipe->allRecipesLimit($_POST["start"],$_POST["limit"]);
        if($result){
        while($red=mysqli_fetch_assoc($result)){
            $id = $red['Id'];
            $title = $red['Title'];
            $authorId = $red['AuthorId'];
            $content = $red['Content'];
            $categoryId = $red['CategoryId'];
            $date = $red['Date'];
            $dt = new DateTime($date);
            $image = $red['Image'];
          
            
            $authresult = $autor->getAuthorById($authorId);
            while($authrow=mysqli_fetch_assoc($authresult)){
            $id_autora_name = $authrow['Name'];
        
            
            $catResult = $kategorija->getCategorieById($categoryId);
            while($catrow=mysqli_fetch_assoc($catResult)){
            $naziv_kategorije = $catrow['CategoryName'];
           
    ?>

                <tr>
                    <td class="align-middle"><?php echo $br ?></td>
                    <td class="align-middle"><img class="mr-2" style="width:80px; height:80px" src="../<?php echo $image;?>"></td>
                    <td class="align-middle" >  <?php echo $title ?></td>   
                    <td  class="align-middle"><?php echo $id_autora_name ?></td>                    
                    <td class="align-middle"><?php echo $dt->format('d.m.Y.'); ?></td>
                    <td class="align-middle pl-1">
                        <a href="edit_recipe.php?id=<?php echo $id;?>"><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-pencil-square mx-1" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg></a>
                        <a onclick="return confirm('Are You sure');" href="delete_recipe.php?id=<?php echo $id;?>&lista=1" class="align-middle text-danger mx-1" title="Delete" data-toggle="tooltip"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg></a>
                        
                    </td>
                
            
        <?php $br++;} }}}}?>