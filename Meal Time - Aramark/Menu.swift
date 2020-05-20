import Foundation

class Menu{

var menuName: String
var menuItems: Array<Meal>

init(menuName: String, menuItems: Array<Meal>)
{
    self.menuName = menuName
    self.menuItems = menuItems
}


}