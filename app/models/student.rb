class Student < ActiveRecord::Base	
	belongs_to :user

  has_and_belongs_to_many :classrooms, :join_table => :classrooms_students

  def to_s
    "#{self.user.name}"
  end
end
