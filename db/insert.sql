INSERT INTO projects ( id, name ) VALUES
	( 1, "support" ),
	( 2, "bugs" ),
	( 3, "new builds" );

INSERT INTO tasks ( project_id, name, due_at ) VALUES
	( 1, "go through support requests", "2014-10-24 17:00:00" ),
	( 1, "update CRM", "2014-10-20 15:30:00" ),
	( 2, "fix random module", "2014-10-21 17:00:00" ),
	( 2, "fix table sorting", "2014-10-20 12:00:00" ),
	( 3, "add user module", "2014-10-30 17:00:00" ),
	( 3, "add tagging system", "2014-11-04 08:00:00" );
