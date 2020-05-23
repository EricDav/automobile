##
# Main function of the Python program.
#
##

# 
from math import pi

# returns the area of a circle, given it's radius
def area_of_circle(radius):
    area = 0
    return area

# Returns the distance travelled, given speed and time which are integer values (km/h and hours respectively)
def distance_travelled(average_speed, time):
    distance=0
    return distance

# Returns the area and volume of a sphere, given its radius
def surface_area_and_volume_of_sphere(radius):
    area=0
    volume=0
    return area, volume
    

    
# The following code helps you to perform some basics tests for the above functions
# It may not include all possible test cases to show that your code is totally correct.
#
# Test option is not available here, only Submit after Run.
# When you submit, additional test cases may be performed.
#

r=10

print("<h4>-- Area of Circle --</h4>")
area=area_of_circle(r)
print("Area of radius is: ", area)

print("<h4>-- Area and volume of sphere --</h4>")
area,volume=surface_area_and_volume_of_sphere(r)
print("Area and volume of sphere: ", area, volume)


print("<h4>-- Distance travelled --</h4>")
avg_speed=100
t=3
distance = distance_travelled(avg_speed, t)
print("Distance travelled: ", distance)
