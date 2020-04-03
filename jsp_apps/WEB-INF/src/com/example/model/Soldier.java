package com.example.model;

import java.util.*;

public class Soldier {
    private String name;
    private String rank;
    private int rankNum;
    private String headgear;
    private String armor;
    private String firearm;
    private String accessory;
    private int carryingWeight;
    
    public Soldier() {
        name = "Unknown";
        rank = "Peon";
        rankNum = 0;
        headgear = "(None)";
        armor = "(None)";
        firearm = "(None)";
        accessory = "(None)";       
        carryingWeight = 0;
    }
    public Soldier(String[] details) {
        name = details[0];
        rank = details[1];
        if(rank.equals("Sergeant")) {
            rankNum = 2;
        } else if (rank.equals("Lieutenant")) {
            rankNum = 3;
        } else if (rank.equals("Captain")) {
            rankNum = 4;
        } else {
            rankNum = 1;
        }
        headgear = details[2];
        armor = details[3];
        firearm = details[4];
        accessory = details[5];                
        findCarryingWeight(details);
    }
    
	  public String setName() { return name; }
	  public String setRank() { return rank; }
	  public String setHeadgear() { return headgear; }
	  public String setArmor() { return armor; }
	  public String setFirearm() { return firearm; }
	  public String setAccessory() { return accessory; }
	    
  	public void findCarryingWeight(String[] details) {
    		if (details[2].equals("Light Helmet")) {
    		    carryingWeight += 5;
    		} else if (details[2].equals("Armored Helmet")) {
    		    carryingWeight += 10;
    		}    		
    		if (details[3].equals("Light Kevlar")) {
    		    carryingWeight += 15;
    		} else if (details[3].equals("Heavy Kevlar")) {
    		    carryingWeight += 25;
    		}    		
     		if (details[4].equals("HK MP5")) {
    		    carryingWeight += 10;
    		} else if (details[4].equals("M4A1")) {
    		    carryingWeight += 20;
    		} else if (details[4].equals("M60")) {
    		    carryingWeight += 40;
    		}
     		if (details[4].equals("Smoke Grenade)")) {
    		    carryingWeight += 4;
    		} else if (details[4].equals("Frag Grenade")) {
    		    carryingWeight += 4;
    		}
	  }
	  
	  public String getName() { return name; }
	  public String getRank() { return rank; }
	  public int getRankNum() { return rankNum; }	  
	  public String getHeadgear() { return headgear; }
	  public String getArmor() { return armor; }
	  public String getFirearm() { return firearm; }
	  public String getAccessory() { return accessory; }		  
	  public int getCarryingWeight() { return carryingWeight; }
}
