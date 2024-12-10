<?php include 'header.inc'; ?>
<?php include 'menu.inc'; ?>

<div id="text"> Job Application Form </div>

<div class="application-container">
        <form action="processEOI.php" method="post" class="application-form" novalidate>
                
                <div class="form-group">
                        <label for="job_reference">Job Reference Number:</label>
                        <select id="job_reference" name="job_reference" required>
                                <option value="" disabled selected>Select a Job Reference</option>
                                <option value="AI001">AI Engineer (AI001)</option>
                                <option value="SW010">Software Developer (SW010)</option>
                        </select>
                        <small>Please select a valid job reference</small>
                </div>
                
                <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" maxlength="20" required>
                        <small>Maximum 20 alphabetic characters</small>
                </div>
                
                <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" maxlength="20" required>
                        <small>Maximum 20 alphabetic characters</small>
                </div>
                
                <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required>
                        <small>Must be between 15 and 80 years old</small>
                </div>
                
                <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                                <option value="" disabled selected>Select your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                        </select>
                </div>
                
                <div class="form-group">
                        <label for="street_address">Street Address:</label>
                        <input type="text" id="street_address" name="street_address" maxlength="40" required>
                        <small>Maximum 40 characters</small>
                </div>
                
                <div class="form-group">
                        <label for="suburb">Suburb:</label>
                        <input type="text" id="suburb" name="suburb" maxlength="40" required>
                        <small>Maximum 40 characters</small>
                </div>
                
                <div class="form-group">
                        <label for="state">State:</label>
                        <select id="state" name="state" required>
                                <option value="" disabled selected>Choose a state</option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="NT">NT</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="ACT">ACT</option>
                        </select>
                </div>
                
                <div class="form-group">
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode" maxlength="4" required>
                        <small>Exactly 4 digits</small>
                </div>
                
                <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" maxlength="50" required>
                        <small>Enter a valid email address</small>
                </div>
        

                <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" id="phone_number" name="phone_number" maxlength="12" required>
                        <small>8 to 12 digits or spaces</small>
                </div>
                
                <div class="form-group">
                        <label>Skills:</label>
                        <div>
                                <input type="checkbox" id="skill1" name="skills[]" value="Problem Solving">
                                <label for="skill1">Problem Solving</label>
                        </div>
                        <div>
                                <input type="checkbox" id="skill2" name="skills[]" value="Teamwork">
                                <label for="skill2">Teamwork</label>
                        </div>
                        <div>
                                <input type="checkbox" id="skill3" name="skills[]" value="Leadership">
                                <label for="skill3">Leadership</label>
                        </div>
                        <div>
                                <input type="checkbox" id="skill4" name="skills[]" value="Time Management">
                                <label for="skill4">Time Management</label>
                        </div>
                        <div>
                                <input type="checkbox" id="skill5" name="skills[]" value="Communication">
                                <label for="skill5">Communication</label>
                        </div>
                </div>
                
                <div class="form-group">
                        <label for="other_skills">Other Skills:</label>
                        <textarea id="other_skills" name="other_skills" rows="4" maxlength="200"></textarea>
                        <small>Optional: Maximum 200 characters</small>
                </div>
                
                <div class="form-buttons">
                        <button type="reset" class="cancel-button">Cancel</button>
                        <button type="submit" class="submit-button">Submit Application</button>

                </div>
        </form>
</div>

<?php include 'footer.inc'; ?>