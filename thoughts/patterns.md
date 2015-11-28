Pattern -- regex, sections, prefixes.


## Create pattern ##


When -- User creates pattern.

We should check if such pattern exists. If exists, connect user to this pattern. Otherwise create new.



## How to check if pattern exists ##

Check regex, then check all patterns with same regex if one of them have same sections and prefixes.




## What happens when user edits pattern  ##

If pattern exists, add *fresh* themes to user. 


### User edits regex ###

Create new pattern (or return existing), delete previous one. (themes deleted).


### User edits sections or/and prefixes ###

If some sections/prefixes deleted, delete connections with themes from them. If sections added, then parse them for new themes. With prefixes. 





### User edits pattern which connected to other user(s) ###

Create new pattern. Delete connection with previous pattern from user. 






## What happens when user deletes pattern ##

