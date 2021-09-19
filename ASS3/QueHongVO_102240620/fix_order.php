<!DOCTYPE html>
<html>
<head>
	<title>Product enquiry page</title>
	<link href = "style.css" rel="stylesheet"/>

	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Dosis&family=Lato&family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device=width, initial-scale=1.0, maximum-scale=1"/>
    <link href = "responsive.css" rel="stylesheet" media= "screen and (max-width:1024px)"/>
    <script src="main.js" async></script>
    <script src="enhancement.js" async></script>

    
</head>
<body>
	<h1>UJIME</h1>
	<header>
		<?php include 'menu.inc'; ?>
	            
	</header>
	
	<div class="bg_img">
	<form  id="regform" class="box" method="post" action="process_order.php" novalidate="novalidate" >
		<h2>Product Enquiry Form</h2>
		<p><label for="First_name"> First Name*:</label>
		    <input type="text" name="First_name" id="First_name" maxlength="25" pattern="^[a-zA-Z ]+$" required= "required" />		    
	    </p>


		<p><label for="Last_name"> Last Name*:</label>
		    <input type="text" name="Last_name" id="Last_name" maxlength="25" pattern="^[a-zA-Z ]+$" required="required"/>		    
	    </p>


	    <p><label for="email">Email*:</label> 
            <input type="text" name= "email" id="email" required="required"/>            
	    </p> 


	    <p><label for="phone_num">Phone Number*:</label> 
            <input type="text" name= "phone_num" id="phone_num" placeholder="Phone Number" required="required"/>           
	    </p>


	    <fieldset>

            <legend class="Address">Address* </legend>
            
            <p><label for ="Street"> Street Address* </label>
                    <input type="text" name="Street" id="Street" maxlength="40" required="required"/>		    
            </p>


            <p><label for = "Suburb/Town"> Suburb/Town* </label>
                    <input type="text" name="Suburb" id="Suburb" maxlength="20" required="required"/>		        
            </p>

            <p><label for="state">*State:</label>
                <select name="state" id="state" required="required">
                <option value="">Please Select</option>         
                <option value="state">VIC</option>
                <option value="state">NSW</option>
                <option value="state">QLD</option>
                <option value="state">NT</option>
                <option value="state">WA</option>
                <option value="state">SA</option>
                <option value="state">TAS</option>
                <option value="state">ACT</option>
                </select></p>

            <p><label for="postcode">*Postcode:</label>
                <input type="text" name="postcode" id="postcode" minlength="4" maxlength="4" size="10" pattern="^[0-9]{4}$" required="required" />            
            </p> 
 
	    </fieldset>


	    <fieldset>    
	    	<legend>Preferred Contact*</legend>
			<p><label for="email">Email</label> 
				<input type="radio" id="mail" name="pref_contact" value="email" required="required" />
			
                <label for="phone">Phone*</label> 
                    <input type="radio" id="phone" name="pref_contact" value="phone"/>
                    
                
                <label for="post">Post*</label> 
                    <input type="radio" id="post" name="pref_contact" value="post"/>
			</p>
		</fieldset>

		<label for="doi">Comments</label>
		<br>
		<textarea id="doi" name="doi" rows="4" cols="40" placeholder="Write your aspect you are interesting in"></textarea>
		<br>
      
        <div class = "form-header" >
        <h2 id = "course_list "> Course List</h2>
        </div>
        
        <div class="form-input-wide">
        <p>ENTER THE QUANTIY NEXT TO THE NUMBER YOU WISH TO ORDER </p>
        </div>

        <section class="container content-section">  
        </section>

        	<section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
                <div class = "cart-row">
                    <div class="cart-item cart-column">
                        <span class="cart-item-title" for="Design">Design</span>                    
                    </div>

                    <span class="cart-price cart-column">$110</span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" id="Number" name="Number" value="0">
                    
                    </div>
                </div> 



                <div class = "cart-row">
                    <div class="cart-item cart-column">
                        <span class="cart-item-title" for="ComputerScience">Computer Science</span>                    
                    </div>

                    <span class="cart-price cart-column">$100</span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" id="Number" name="Number" value="0">
                    
                    </div>
                </div>  



                <div class = "cart-row">
                    <div class="cart-item cart-column">
                        <span class="cart-item-title" for="Marketing">Marketing</span>                    
                    </div>

                    <span class="cart-price cart-column">$110</span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" id="Number" name="Number" value="0">                    
                    </div>
                </div>  



                <div class = "cart-row">
                    <div class="cart-item cart-column">
                        <span class="cart-item-title" for="Business_and_Finance">Business and  Finance</span>                    
                    </div>

                    <span class="cart-price cart-column">$99</span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" id="Number" name="Number" value="0">                    
                    </div>
                </div>   
      
                </div>
                <div class="cart-total">
                    <strong class="cart-total-title">Total</strong>
                    <span class="cart-total-price" type="price" name="price" id="price" >$0</span>
                </div>
                </section>


            <input class="btn-purchase" type="submit" value="PURCHASE" />

            <input class = "reset" type="reset" value="Reset Application"  />
        </section>


        
	</form>
	</div>

</body>
</html>