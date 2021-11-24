 <?php 
           if(isset($_COOKIE["username"])){
            $usrnm=$_COOKIE["username"];
            }
          else{
            $usrnm='';
          }

 if(isset($_COOKIE["password"])){
            $pass=$_COOKIE["password"];
            }
          else{
            $pass='';
          }
?>

   
   
  

<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns content">
    <div class='panel'>
        <h3 class="text-center">
            Newsportal Login
        </h3>
        <?= $this->Form->create(); ?>
          <h3> Username</h3>
        <?= $this->Form->input('username', ['value' => $usrnm]); ?>
         <br>
         <br>
         <br>
          <h3> Password</h3>
         <?=$this->Form->input('password', ['value' => $pass, 'type'=>'password']); ?>

         <br>
         <br>
         <br>
        <?php echo $this->Form->checkbox('remember_me', ['checked'=> true]); ?> Remember Me
          <?= $this->Form->submit('Login', array('class'=> 'button')); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>