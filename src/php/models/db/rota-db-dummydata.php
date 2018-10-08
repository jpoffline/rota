<?php


function RotaSQL_setDummyInfo()
{
	$conn = GetRotaSQLconn();
	
	
	// 	Some members
	$conn->query("INSERT INTO members (username, firstname, lastname) VALUES ('jp', 'Jonathan', 'Pearson')");
	$conn->query("INSERT INTO members (username, firstname, lastname) VALUES ('mb', 'Matt', 'Burgin')");
	$conn->query("INSERT INTO members (username, firstname, lastname) VALUES ('ab', 'Anna', 'Burgin')");
	$conn->query("INSERT INTO members (username, firstname, lastname) VALUES ('ip', 'Iona', 'Pearson')");
	
	// 	Some rotas
	$conn->query("INSERT INTO rotas (rotaname, groupname) VALUES ('music', 'Band')");
	$conn->query("INSERT INTO rotas (rotaname, groupname) VALUES ('juniorchurch', 'Team')");
	
	// 	Define some period names
	$conn->query("INSERT INTO periods (rotaid, periodname) VALUES (1,'Winter 2018')");
	$conn->query("INSERT INTO periods (rotaid, periodname) VALUES (1,'Spring 2019')");
	$conn->query("INSERT INTO periods (rotaid, periodname) VALUES (2,'Winter 2019')");
	$conn->query("INSERT INTO periods (rotaid, periodname) VALUES (2,'Spring 2019')");
	
	// 	Define dates for periods
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'02/09/2018')"); //1
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'09/09/2018')"); //2
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'16/09/2018')"); //3
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'23/09/2018')"); //4
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'30/09/2018')"); //5
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'07/10/2018')"); //6
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'14/10/2018')"); //7
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'21/10/2018')"); //8
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'28/10/2018')"); //9

	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (2,'02/02/2019')"); //10
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (2,'09/02/2019')"); //11
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (2,'16/02/2019')"); //12
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (2,'23/02/2019')"); //13
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (2,'30/02/2019')"); //14

	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (3,'02/09/2019')"); //15
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (3,'09/09/2019')"); //16
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (3,'16/09/2019')"); //17
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (3,'23/09/2019')"); //18
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (3,'30/09/2019')"); //19
	
	// 	Link members to rotas
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (1,1)");
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (2,1)");
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (2,4)");
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (1,2)");
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (1,3)");
	
	// 	Define a list of skills
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Sound',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Piano',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Voice',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Voice - lead',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Guitar - backing',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Guitar - lead', 1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Bass guitar', 1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Drums', 1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Percussion', 1)");
	
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Leader', 2)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Helper', 2)");
	
	// 	Link skills to members
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (1,1)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (1,7)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (2,4)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (2,6)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (2,7)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (2,8)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (3,2)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (3,3)");
	
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (4,10)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (1,11)");
	
	// 	Declare availability for users on rotas.
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,1,1,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,1,2,1,2)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,1,3,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,1,8,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,1,7,1,3)");
	
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,2,1,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,2,3,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,2,4,1,1)");
	
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,3,1,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,3,3,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,3,5,1,1)");

	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,1,10,2,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,1,11,2,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (1,1,13,2,1)");

	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (2,4,15,3,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (2,4,16,3,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (2,4,17,3,1)");

	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (2,1,16,3,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (2,1,18,3,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid, availtypeid) VALUES (2,1,19,3,1)");
	
	$conn->query("INSERT INTO availabilitytypes (availtype) VALUES ('tentative');");
	$conn->query("INSERT INTO availabilitytypes (availtype) VALUES ('confirmed');");
	$conn->query("INSERT INTO availabilitytypes (availtype) VALUES ('unavailable');");

}

?>