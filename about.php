<?php include 'header.inc'; ?>
<?php include 'menu.inc'; ?>

<main class="container">
    <section class="group-info">
        <h2>Group Information</h2>
        <div class="group-details">
            <p><strong>Group Name:</strong> Cow & Grass</p>
            <p><strong>Lecture Name:</strong> Denis Nguyen</p>
            <p><strong>Course:</strong> 2024-HX09-COS10026-Computing Technology Inquiry Project (Hanoi)</p>
            <p><strong>Group Email:</strong> <a href="mailto:huynhquochieu1132005@gmail.com">huynhquochieu1132005@gmail.com</a></p>
        </div>

        <section class="schedule">
            <h2>My Weekly Availability</h2>
            <table>
                <thead>
                    <tr>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Busy</td>
                        <td class="available">Available</td>
                        <td>Busy</td>
                        <td class="available">Available</td>
                        <td>Busy</td>
                        <td>Busy</td>
                        <td class="available">Available</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>

    <section class="members-info">
        <div class="member">
            <input type="checkbox" id="member1" class="toggle-detail">
            <label for="member1">
                <img src="images/hieu.jpg" alt="Huynh Quoc Hieu" width="150">
            </label>
            <div class="member-details">
                <ul>
                    <li>Skilled in Ruby programming</li>
                    <li>Many years of experience in circuit connection</li>
                    <li>Good leadership thinking</li>
                    <li>Enjoy car, vehicles and mechanical design</li>
                </ul>
            </div>
        </div>

        <div class="member">
            <input type="checkbox" id="member2" class="toggle-detail">
            <label for="member2">
                <img src="images/duc_anh.jpg" alt="Le Duc Anh" width="150">
            </label>
            <div class="member-details">
                <ul>
                    <li>3 years of experience in Python</li>
                    <li>Participated in large-scale projects with many participants</li>
                    <li>IoT Engineer and Data Analyst</li>
                    <li>Enjoys gaming, reading, singing, listening to music, storytelling, and sports</li>
                    <li>Favorite sport: Badminton</li>
                </ul>
            </div>
        </div>

        <div class="member">
            <input type="checkbox" id="member3" class="toggle-detail">
            <label for="member3">
                <img src="images/hoang_viet_duck.jpg" alt="Nguyen Huy Hoang Viet" width="150">
            </label>
            <div class="member-details">
                <ul>
                    <li>3 years of experience in C++ and Python</li>
                    <li>Participated in various large and small projects</li>
                    <li>Loves reading Chinese novels and playing Elden Ring</li>
                    <li>Favorite sport: Badminton</li>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.inc'; ?>
