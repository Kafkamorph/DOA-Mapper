READ FIRST (summary):

This is NOT a "hack". It's a vulnerability that Kabam decided not to fix. (as well as all the multiple problems they ignore)

The game has an eternal flaw: the Flash file contains the credentials used to encrypt the data sent to the server (encryption should be bidirectional, as any noob knows),
so even if they change it, the problem lies in the CORE of their bad programming.
Even the cookie has essential data that should be hidden. This totals an amount of flaws that will not be fixed easily.

Paying customers should think about if they want to keep spending money on a flawed game, and a very unprofessional dev team.

- Kabam was contacted 2 months ago where I explicitely warned them about this, and got no answer.
- This is a flaw in the client-server communication. A severe one, that any programmer can either fix, or use.
- I OFFERED to help them protect it. Got no answer.
- 2 days ago, they started banning (4 out of my 100+) forum accounts with no valid reasons, after I complained about having 4 marches stuck, and exposing their flaws.

So, 2 months after my warning, I am not making the DOA Mapper public. Anyone is free to fork it, modify it, upgrade it.

Kabam, it was easier for you to fix 4 stuck marches than have this public. Now you don't have a say anymore. 
I'll take it from here.



DOA-Mapper
==========

Instructions and source on how to map your whole realm in Dragons of Atlantis from Kabam and present the data on a clean interface.



Origin
======

More than 2 months ago, I messaged support saying I had found a flaw that allowed a user to map the whole realm in 2 ways:
- full map, square by square, with everything, including wildernesses (not included here, takes around 3 days to map)
- by using a flaw both in their API and in their already obsolete Flash code, one could make an API call to "get" 16x16 squares of data - (user, might, alliance, and type of outpost)

Kabam never replied to my offer. I say "offer" because, as an Application/Network Security Auditor, I usually charge for this, obviously. 


Release
=======

Why didn't I keep this to myself?

For a long time, I did. Only the alliance I was in had access, and only certain members, not all.

Recently, I had FOUR stuck marches and messaged support immediately, as this severely affects my gameplay.
After almost a week, no reply.
This was too much, and I went to the forum. Trying for them to move their lazy ass and do something.
They didn't. I started getting pissed.

REMINDER: many people buy rubies who allows them (Kabam) to have a job. They are breaking the EULA, TOS and all Dev101 rules by not even trying to keep
their users' data safe.

I posted on the forums that this flaw existed.
4 times.
They banned me 4 times.
I could have just made more accounts, but they were determined to ban me for a bunch of reasons who are pathetic:
"encouraging users to break TOS" when, in fact, it's them who are not doing their job.

So here is my gift to the community.
I might map a couple of realms and post them free for all.
But I surely won't map all (almost 400) realms, to here is the source. Fork it, and make those bastards pay for being rude and greedy.
Or leave the game if you can't install this and feel you're ad a disadvantage. If you can't install it and your enemies can, you sure are.

Kabam might change the encryption code that is inside the Flash file, but that will ALWAYS be retrievable.

After all, this was supposed to just be a Proof of Concept. But after they banned my first account for fake reasons, it became personal.


Kabam might "change something" to make this method non-working.
And I will post updates so you can keep screwing them up.
Kabam went into a war they can't win.

=================================================

TECH file - geeky details for the full integration.

GIFT file - full data on the Cantil realm as a proof of concept

=================================================

This project's code and is released under the GPL as a game modifier using Kabam's lack of professionalism and coding abilities, leaving multiple ways to make a map of any server.
I don't force you to use it, but feel free to fork it, modify it, and make suggestions.


PS - If you're still an ass who buys rubies to have advantage, you can now understand how stupid you are. Advantages can come in many forms.

PS@Kabam - You shouldn't have messed with me. I warned you 4 times.
