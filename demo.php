<?php

require('form-validation.php');

$contactForm = new validateForm();

$contactForm->setRules(array(
                           array('name'  => 'name',
                                 'label' => 'Name',
                                 'rules' => 'required|min_length[3]'),
                           array('name'  => 'email',
                                 'label' => 'Email',
                                 'rules' => array('required', 
                                                  'valid_email'))));

/*
$contactForm->setRule('name', 'Name', 'required|min_length[3]');
$contactForm->setRule('email', 'Email', 'required|valid_email');
*/

$contactForm->runValidation();

if ($contactForm->formSuccess()) {
   echo 'Thanks for contacting us!';
} else {

$contactForm->displayErrors(1); ?>


<form action="" method="post">
Name: <input type="text" name="name" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : ''; ?>" /><br />
Email: <input type="text" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" /><br /> 
<input type="submit" value="Contact Us!" />
</form>

<?php
}