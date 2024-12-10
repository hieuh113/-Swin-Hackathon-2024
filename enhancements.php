<?php include 'header.inc'; ?>
<?php include 'menu.inc'; ?>


<main class="enhancements-container">
    
    <section>
        <h2>1. Responsive Layout using Flexbox</h2>
        <p><strong>How it goes beyond basic requirements:</strong>
            The use of Flexbox allows the layout of the webpage to be fully responsive, adjusting automatically based on the screen size. This provides a seamless user experience across mobile, tablet, and desktop devices.
        </p>
        <p><strong>Code needed to implement this feature:</strong></p>
        <pre>
.container {
    display: flex;
    justify-content: space-between;
    margin: 20px;
}
        </pre>
        <p><strong>References:</strong>
            <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Basic_Concepts_of_Flexbox" target="_blank">MDN Flexbox Documentation</a>
        </p>
        <p><strong>Link to the feature:</strong>
            <a href="index.php#container">View Flexbox Implementation</a>
        </p>
    </section>

    
    <section>
        <h2>2. Hover Effects and Transitions</h2>
        <p><strong>How it goes beyond basic requirements:</strong>
            By applying hover effects and transitions, the web pages provide smooth visual feedback when users interact with elements like images and buttons. This improves the overall user interface and experience.
        </p>
        <p><strong>Code needed to implement this feature:</strong></p>
        <pre>
.apply-button:hover {
    background-color: #A8001D;
    transition: background-color 0.3s ease;
}

.member img:hover {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}
        </pre>
        <p><strong>References:</strong>
            <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/transition" target="_blank">MDN Transitions Documentation</a>
        </p>
        <p><strong>Link to the feature:</strong>
            <a href="about.php#members">View Hover and Transition Effects</a>
        </p>
    </section>

    
    <section>
        <h2>3. Checkbox-based Toggle for Details</h2>
        <p><strong>How it goes beyond basic requirements:</strong>
            This feature enables users to reveal or hide additional details (e.g., job descriptions or team member information) by clicking on a checkbox. The toggle feature is purely CSS-based, providing an interactive experience without needing JavaScript.
        </p>
        <p><strong>Code needed to implement this feature:</strong></p>
        <pre>
.toggle-detail:checked + label + .member-details {
    display: block;
}
.toggle-detail:checked + .job-info + .job-detail {
    max-height: 1000px;
    padding: 20px;
}
        </pre>
        <p><strong>References:</strong>
            <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/:checked" target="_blank">MDN :checked Pseudo-class Documentation</a>
        </p>
        <p><strong>Link to the feature:</strong>
            <a href="jobs.php#jobs">View Toggle Feature</a>
        </p>
    </section>
    
    <section>
        <h2>4. Using ENUM to Manage Data Status</h2>
        <p><strong>How it goes beyond basic requirements:</strong></p>
        <ul>
            <li>The use of the <code>ENUM</code> data type helps restrict and control status values, ensuring data validity.</li>
            <li>Predefined statuses (<code>New</code>, <code>Current</code>, <code>Final</code>) create consistency across the system.</li>
        </ul>
        <p><strong>Code needed to implement this feature:</strong></p>
        <pre>
CREATE TABLE IF NOT EXISTS eoi (
    ...
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
);
    </pre>
        <p><strong>References:</strong>
            <a href="https://dev.mysql.com/doc/refman/8.0/en/enum.html" target="_blank">MySQL ENUM Data Type Documentation</a>
        </p>
        <p><strong>Link to the feature:</strong>
            <a href="processEOI.php">View ENUM Implementation in processEOI.php</a>
        </p>
    </section>
    
    <section>
        <h2>5. Dynamic Status Dropdown</h2>
        <p><strong>How it goes beyond basic requirements:</strong></p>
        <p>
            Allows administrators to update the status of EOIs directly from the interface.</p>
        <p><strong>Code needed to implement this feature:</strong></p>
        <pre>
<select name='new_status'>
    <option value='New'" . ($row['status'] === 'New' ? ' selected' : '') . ">New</option>
    <option value='Current'" . ($row['status'] === 'Current' ? ' selected' : '') . ">Current</option>
    <option value='Final'" . ($row['status'] === 'Final' ? ' selected' : '') . ">Final</option>
</select>
    </pre>
        <p><strong>References:</strong>

            <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select" target="_blank">MDN Documentation on &lt;select&gt; Element</a>
        </p>

        <p><strong>Link to the feature:</strong>
            <a href="manage.php#status-dropdown">View Dynamic Dropdown in Manage EOIs</a>
        </p>
    </section>
    
    <section>
        <h2>6. Session Management</h2>
        <p><strong>How it goes beyond basic requirements:</strong></p>
        <p>
            Uses PHP sessions to track authenticated users, ensuring that only logged-in users can access certain pages like `manage.php`.
        </p>
        <p><strong>Code needed to implement this feature:</strong></p>
        <pre>
session_start();
if ($username === USERNAME && $password === PASSWORD) {
    $_SESSION['loggedin'] = true;
    header('Location: manage.php');
    exit;
}
    </pre>
        <p><strong>References:</strong>
            <a href="https://www.php.net/manual/en/book.session.php" target="_blank">PHP Sessions Documentation</a>
        </p>
    </section>

</main>

<?php include 'footer.inc'; ?>