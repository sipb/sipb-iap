---------------
Basic barebones things
---------------

+ The IAP coordinator should be able to login to a web interface to manage/edit/add/etc classes and info.

+ The client website should display a list of the classes and all the info in some easily navigable format. Take design cues from ine's design and the official MIT IAP index.

+ The main unit should be a "course" object for each course/class. The course objects should have at least the following properties (some of which might be blank for particular courses), most of which are strings (except dates/times and draft status):
...
- A title.

- Boolean variable deciding whether it is a draft or not. Default to yes. Drafts aren't displayed on the main site. This can allow for tons of old classes in the admin interface that may or may not run. This also allows the coordinator to get everything ready incrementally before rolling out the website.

- A number of "session" subobjects for each session of the course. These objects should each have: a start date, an end date (defaults to start date), a start time, an end time, a location.

- A course description.

- Internal notes for the coordinator, invisible to the outsiders.

- The course teachers.

- Contact information (sipb-iap-foo@mit.edu).

- A url for the course website.

- A list of prereqs for the course. Default to "None.".

- A note about attendance, i.e. whether you should come to all sessions (sequential), or just one (duplicates), or what. Perhaps have some options to choose from, or roll your own.

- A primary sponsor. Defaults to "SIPB".

- A list of cosponsors.

- Publicly visible alerts/notes. This is for things like room changes, time changes, etc.
...

+ Name of SIPB IAP coordinator and link to sipb-iap@mit.edu.

+ "What is SIPB IAP?"

+ Link to SIPB and the blurb from my email signatures. ("What is SIPB?")

+ Link to SIPB Google calendar.

+ Link to the official MIT IAP index. ("What else happens during IAP?")

---------------
Intermediate things
---------------

+ Multiple options on the client side for listing the classes: alphabetical, by date, what's going on this week, classes that have alerts. (Optionally have some sort of theme associated with certain weeks.)

+ Make classes with alerts visible in some special way on the client side.

+ Push a button clientside and get .ics files for individual classes, selections of classes, or the whole of SIPB IAP. Make sure they can be cleanly imported into Google calendar.

+ Our own dynamic SIPB IAP calendar to display on the site, separate from the SIPB Google calendar.

+ A way of displaying clientside the IAP website from past years (from here on out). Requires that we save the databases for each year.

+ A master draft database that includes all past classes that have ever run (from here on out) that automatically populates the admin interface. They should all be set as "draft" by default, and have their sessions' start and end times/dates and locations blanked out.

+ The last two ideas could be implemented by a button in the admin interface that saves the current database as associated with the past year, increments the year, marks everything as a draft, zeroes out the appropriate fields, and saves that as the starting place for the current year.

+ A place for the coordinator to input what classrooms they have reserved and for what times/dates. They should be able to automatically check if any classes are currently submitted that have times and locations that are out of the reservation range. Perhaps this should happen automatically when they update a class and they should get a warning if they try to make one outside of their reserved range (although it should still allow it, but maybe mark the class in the admin interface as having a warning).

+ Some way of automatically populating and updating the SIPB Google calendar, or perhaps our own SIPB IAP Google subcalendar.

---------------
Advanced/bonus/extra things
---------------

+ Just like the automatic reservation cross-checking, also do automatic conflict checking, i.e. keep track of accidentally spacetime collisions between classes. Throw a warning when submitting a class that will cause such a collision. Have a marker in the admin interface for such warnings.

+ Have moira lists for sipb-iap-foo-students that clear out in between years and people can click a button on each clientside website course entry to be added to the associated list.

+ Have a place to keep track of course attendance each year to track success of various classes. Have each teacher take a headcount at the beginning of each session.

+For extra bonus points, have a way for the coordinator to track metrics like total number of ~unique students (only count attendance for one session for sequential courses but count for all duplicate sessions), total number of classes, average number of students per class, and so on. Perhaps graphed over years, weeks, whatever.

+ Possibly allow teachers to modify certain aspects of their courses in the database, but this is very iffy.

+ Automatically generate and send emails to poke previous teachers about teaching again this year. Simple form letter with the new IAP coordinator's name, the class title, and so on. Don't make it look like a form letter. Make it look/sound personally sent. For double bonus points (unnecessary), let the new IAP coordinator craft their own personal wording. Don't send it to sipb-iap-foo@mit.edu, actually blanche the list and send it to the individual teachers' addresses; it is more personal that way. CC sipb-iap on it and send it from the coordinator's personal address.
