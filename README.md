# JotN_Notes_App
This is a Notes App that allows users to sign up, create teams, collaborate and share notes.

3-Day Take-Home Assignment — Advanced Feature-by-Feature

🗂 Project:
Team Collaboration Notes App— Think of it as a mini Notion/Slack hybrid: users can sign up, create teams, and share notes in real time.


📆 Day 1 — Multi-Tenant Auth & Team Onboarding

🎯 Goal:
Design and build secure user auth + multi-tenant teams. Each user belongs to one or more teams.

✅ Key Requirements
	1.	Design
	•	Draft clear wireframes:
	•	Sign up & login flow.
	•	“Create Team” page.
	•	“Join Team” flow (using invite codes or links).
	•	Define user roles: Owner, Member.
	2.	Backend
	•	Auth system with JWT/session-based auth.
	•	Team model:
	•	teams table
	•	users table
	•	team_members (many-to-many with roles)
	•	Invite logic (generate unique team invite code).
	3.	Frontend
	•	Registration + login forms.
	•	“Create Team” & “Join Team” pages.
	•	After login, user lands on a Team Dashboard showing teams they belong to.
	4.	Testing & Edge Cases
	•	User cannot join same team twice.
	•	Invite code expires after use or expiry date.
	5.	Deliverables
	•	Repo link with instructions.
	•	PDF with wireframes, ERD diagram, and design assumptions.
