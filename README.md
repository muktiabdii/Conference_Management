## Conference Management API 🚀  

As someone passionate about backend development, I built this **REST API for a Conference Management Platform** to simplify how conferences are organized and managed. This project is designed to provide a **seamless and efficient** way to handle session management, attendee engagement, and administrative tasks in academic and organizational events.  

This is also **my first API project**, built as part of the **Freepass BCC 2025 selection process**, where I aim to demonstrate my backend development skills while contributing to a meaningful solution for conference management.  

With this API, I aim to **enhance knowledge sharing and professional networking** while ensuring a structured and scalable system for managing conferences. This project is still evolving, and I'm excited to improve it further!  

Feel free to explore, contribute, or share your feedback. Let's build something impactful together! 💡🔥

## **⭐** Minimum Viable Product (MVP)

Since I’m building this project as part of the **Freepass BCC 2025 selection process**, I’ve outlined some key features that will enhance its functionality and support **BCC Conference** in the future. Check them out below! 🚀

- New user can register account to the system ✔️
- User can login to the system ✔️
- User can edit their profile account ✔️
- User can view all conference sessions ✔️
- User can leave feedback on sessions ✔️
- User can view other user's profile ✔️
- Users can register for sessions during the conference registration period if seats are available ✔️
- Users can only register for one session within a time period ✔️
- Users can create, edit, delete their session proposals ✔️
- Users can only create one session proposal within a time period ✔️
- Users can edit, delete their session ✔️
- Event Coordinator can view all session proposals ✔️
- Event Coordinator can accept or reject user session proposals ✔️
- Event Coordinator can remove sessions ✔️
- Event Coordinator can remove user feedback ✔️
- Admin can add new event coordinators ✔️
- Admin can remove users/event coordinators ✔️

## **🌎** Service Implementation

```
GIVEN => I am a new user
WHEN  => I register to the system
THEN  => System will record and return the user's registration details

GIVEN => I am a user
WHEN  => I log in to the system
THEN  => System will authenticate and grant access based on user credentials

GIVEN => I am a user
WHEN  => I edit my profile account
THEN  => The system will update my account with the new information

GIVEN => I am a user
WHEN  => I view all available conference's sessions
THEN  => System will display all conference sessions with their details

GIVEN => I am a user
WHEN  => I leave feedback on a session
THEN  => System will record my feedback and display it under the session

GIVEN => I am a user
WHEN  => I view other user's profiles
THEN  => System will show the information of other user's profiles

GIVEN => I am a user
WHEN  => I register for conference's sessions
THEN  => System will confirm my registration for the selected session

GIVEN => I am a user
WHEN  => I create a new session proposal
THEN  => System will record and confirm the session creation

GIVEN => I am a user
WHEN => I see my session's proposal details
THEN => System will display my session's proposal details

GIVEN => I am a user
WHEN  => I update my session's proposal details
THEN  => System will apply the changes and confirm the update

GIVEN => I am a user
WHEN  => I delete my session's proposal
THEN  => System will remove the session's proposal

GIVEN => I am a user
WHEN => I see my session details
THEN => System will display my session details

GIVEN => I am a user
WHEN  => I update my session details
THEN  => System will apply the changes and confirm the update

GIVEN => I am a user
WHEN  => I delete my session
THEN  => System will remove the session

GIVEN => I am an event coordinator
WHEN  => I view session proposals
THEN  => System will display all submitted session proposals

GIVEN => I am an event coordinator
WHEN  => I accept or reject the session proposal
THEN  => The system will make the session either be available or unavailable

GIVEN => I am an event coordinator
WHEN  => I remove a session
THEN  => System will delete the session

GIVEN => I am an event coordinator
WHEN  => I remove user feedback
THEN  => System will delete the feedback from the session

GIVEN => I am an admin
WHEN  => I add new event coordinator
THEN  => System will make the account to the system

GIVEN => I am an admin
WHEN  => I remove a user or event coordinator
THEN  => System will delete the account from the system
```

## **👪** Entities and Actors

User : Individuals who interact with the system. They have several roles such as “user”, “event coordinator”, and “admin”.

Atribut :
- id
- name
- email
- password
- role : user | event_coordinator | admin
- created_at
- updated_at

Session : Represents a conference sessions.

Atribut : 
- id
- title
- description
- author
- start_time
- end_time
- capacity
- participants
- created_at
- updated_at

Proposal : Represents a conference session proposals.

Atribut : 
- id
- author
- title
- description
- status : pending | accepted | rejected
- created_at
- updated_at

Feedback : Represents a conference session feedbacks

Atribut :
- id
- commenter
- session_id
- feedback
- created_at
- updated_at

Session Registration : Represents a conference session registrations.

Atribut :
- id
- user_id
- session_id
- registration_at
- created_at
- updated_at

## **🧪** API Installation
**Running**
1. Cloning repository from github to your local computer
2. Download composer
3. Go to the cloned project folder
4. Install all project dependencies
```
composer install
```
5. Edit the .env file and configure database connection settings like DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD
6. Run database migration
```
php artisan migrate
```
7. Run the local server
8. Open the postman app and enter the API URL
```
http://freepass-2025.test/Konferensi_BCC/public/api/
```


## **📃** API Documentation
https://documenter.getpostman.com/view/41537989/2sAYQiBnvY
