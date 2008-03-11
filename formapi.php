<?
	
	/**
	* Print out the form that is defined by $formid
	*/
	function formapi_print($formid)
	{
		global ${'formapi_define_' . $formid}; // make the definition a global variable
		
		// use yaml parser
		include_once("spyc.php");
		$parser = new Spyc;
		$formdefinition  = $parser->load(${'formapi_define_' . $formid}); // get YAML formatted variable and turn into PHP array.
		
		// Start de form
		print "<form method='post' action='formapi_submit.php'>";
		print "<input type='hidden' name='formid' value='" . $formid . "'>";
		
		// loop tru array
		while (list($key, $val) = each($formdefinition)) 
		{
			
			// Massage values that are used for all fields
			if ($val["required"]) $req = " (required)";
			else $req = "";
			
			print "<br>"; // for layout
			switch ($key) {
				case "title":
					print "<h2>$val</h2>";
					break;
				case "textfield":
					if (!$val["id"]) $val["id"] = formapi_getuniqueid(); // if id is not defined.
					
					print '<label for="' . $val["id"] . '">' . $val["label"] . '</label> <input type="text" name="' . $val["id"] . '" id="' . $val["id"] . '">' . $req;
					break;
				case "checkbox":
					if (!$val["id"]) $val["id"] = formapi_getuniqueid(); // if id is not defined.
					print '<br><input type="checkbox" name="' . $val["id"] . '" value="checkbox" id="' . $val["id"] . '"> <label for="' . $val["id"] . '">' . $val["label"] . '</label>' . $req;
					break;
				case "dropdown":
					// loop tru values
					while (list ($key2, $val2) = each($val["values"]))
					{
						$options .= "<option value='" . $val2 . "'>" . $key2 . "</option>";
					}
					
					print <<<EOF
<label for="select">{$val["label"]}</label>
  <select name="select" id="select">
    $options
  </select>
EOF;
					break;	
				
				case "radiogroup":
					if ($val["title"]) print "<h4>" . $val["title"] . "</h4>";
					
					while (list ($key2, $val2) = each($val["values"]))
					{
						if ($key2["selected"] == TRUE) $selected = " selected";
						else $selected = "";
						print "<label><input type='radio' name='" . $val["id"] . "' value='$val2' $selected>$key2</label><br>";
					}
					
				case "fieldset":
					print "<fieldset><legend>" . $val["label"] . "</legend>";
					break;
				case "fieldsetclose":
					print "</fieldset>";
					break;
				case "submitbutton":
					print '<input type="submit" name="submit" value="' . $val["label"] . '">';
					break;
				default:
					echo "[unknown formfield type.]";
					break;
				}
		}
		
		print "</form>";
	}
	
	/**
	* Returns a unique ID.
	*/
	function formapi_getuniqueid()
	{
		global $uniqueid;
		$uniqueid++;
		return "id_" . $uniqueid;
	}
	
	/**
	* Receives a POST or GET and takes care of the form.
	*/
	function formapi_receiveform()
	{
		global $_POST, $_GET;
		
		// Call submitfunction
		$submitfunction = "formapi_submit_" . $_POST["formid"];
		$redirect = $submitfunction($_POST); // call submitfunction
		
		// Redirect.
		if ($redirect) header("Location: $redirect"); // redirect to result of submitfunction if not FALSE.
	}
?>