# select all tasks for project id 2
SELECT * FROM tasks WHERE project_id = 2;

# select all projects ordered by name
SELECT * FROM projects ORDER BY name;

# select all tasks for project id 3 after the 22nd
SELECT * FROM tasks WHERE project_id = 3 AND due_at > "2014-10-22";
