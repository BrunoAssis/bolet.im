class TeacherClass < ActiveRecord::Base
	belongs_to :teacher
	belongs_to :subject
	belongs_to :classroom

  def to_s
    if self.teacher
      "#{self.classroom} - #{self.teacher.user.name} - #{self.subject}"
    else
      "#{self.classroom} - #{self.subject}"
    end
  end
end
